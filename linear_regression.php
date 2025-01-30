<?php

require 'vendor/autoload.php';
include 'config.php';

use Phpml\Regression\LeastSquares;
date_default_timezone_set('Asia/Manila');

function getID($username) {
    include('config.php'); 

    $sql = "SELECT IdNum FROM account WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['IdNum']; 
    } else {
        return 'Not_Found';
    }
}

$id = getID($_POST['username']);
$username = $_POST['username'];

if ($id == "Not_Found") {
    echo "User ID Not Found.";
    exit;
}

// Function to fetch weight logs based on the required interval
function fetchWeightLogs($id, $startDate, $endDate) {
    global $conn;
    $weightLogsQuery = "SELECT `date`, `weight` FROM `weightlog`
                        WHERE `userid` = :id
                        AND `date` >= :startDate
                        AND `date` <= :endDate
                        ORDER BY `date` ASC";
    $weightLogsStmt = $conn->prepare($weightLogsQuery);
    $weightLogsStmt->bindParam(':id', $id);
    $weightLogsStmt->bindParam(':startDate', $startDate);
    $weightLogsStmt->bindParam(':endDate', $endDate);
    $weightLogsStmt->execute();
    return $weightLogsStmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch attendance records
function fetchAttendanceData($id, $startDate, $endDate) {
    global $conn;
    $attendanceQuery = "SELECT `timeIn` FROM `attendance`
                        WHERE `user_id` = :id
                        AND `timeIn` >= :startDate
                        AND `timeIn` <= :endDate
                        ORDER BY `timeIn` ASC";
    $attendanceStmt = $conn->prepare($attendanceQuery);
    $attendanceStmt->bindParam(':id', $id);
    $attendanceStmt->bindParam(':startDate', $startDate);
    $attendanceStmt->bindParam(':endDate', $endDate);
    $attendanceStmt->execute();
    return $attendanceStmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get the current date
$currentDate = date('Y-m-d');

// Fetch weight logs for the last 6 months
$sixMonthsAgo = date('Y-m-d', strtotime('-6 months', strtotime($currentDate)));
$weightLogs = fetchWeightLogs($id, $sixMonthsAgo, $currentDate);
$attendanceData = fetchAttendanceData($id, $sixMonthsAgo, $currentDate);


if (count($weightLogs) < 1) {
    $errorMessage = [
        'error' => 'Insufficient weight logs for training.'
    ];
    header('Content-Type: application/json');
    echo json_encode($errorMessage);
    exit; // Stop further processing if weight logs are insufficient
}
// Debugging
// echo "User ID: " . $id . "<br>";
// echo "Username: " . $username . "<br>";
// echo "Weight Logs Count: " . count($weightLogs) . "<br>";
// echo "Attendance Data Count: " . count($attendanceData) . "<br>";

// Check if we have sufficient data for weekly prediction
if (count($weightLogs) >= 2 && count($attendanceData) >= 2) {
        // Calculate average weight per week
        $weeklyAverages = [];
        $currentWeekStart = null;
        $currentWeekWeights = [];
        
        foreach ($weightLogs as $log) {
            $logDate = strtotime($log['date']);
            $weekStart = date('Y-m-d', strtotime('last Monday', $logDate));
            
            if ($currentWeekStart === null) {
                // First entry
                $currentWeekStart = $weekStart;
            }
            
            if ($weekStart !== $currentWeekStart) {
                // New week, calculate average for previous week
                if (!empty($currentWeekWeights)) {
                    $weeklyAverages[$currentWeekStart] = array_sum($currentWeekWeights) / count($currentWeekWeights);
                }
                
                // Reset for new week
                $currentWeekStart = $weekStart;
                $currentWeekWeights = [];
            }
            
            // Store weight for current week
            $currentWeekWeights[] = $log['weight'];
        }
        
        // Add average for the last week
        if (!empty($currentWeekWeights)) {
            $weeklyAverages[$currentWeekStart] = array_sum($currentWeekWeights) / count($currentWeekWeights);
        }
        
        // Prepare features and labels for weekly prediction
        $features = [];
        $labels = [];
        
        foreach ($weeklyAverages as $weekStart => $averageWeight) {
            $features[] = [strtotime($weekStart)];
            $labels[] = $averageWeight;
        }
        
        // Train the model (using linear regression)
        $regression = new LeastSquares();
        $regression->train($features, $labels);
    
        // Predict next week's weight and date
        $lastWeekStartDate = array_key_last($weeklyAverages);
        $nextWeekStartDate = date('Y-m-d', strtotime('+1 week', strtotime($lastWeekStartDate)));
        $nextWeekTimestamp = strtotime($nextWeekStartDate);
        
        // Predict the weight for the next week
        $predictedWeight = $regression->predict([[$nextWeekTimestamp]]);
    
        $predictionData = [
            'predicted_date' => $nextWeekStartDate,
            'predicted_weight' => round($predictedWeight[0], 1)
        ];
    
        header('Content-Type: application/json');
        echo json_encode($predictionData);
} else {
    
    // echo "Insufficient data for weekly prediction. Using daily prediction.<br>";

    // Calculate features and labels for daily prediction
    $features = [];
    $labels = [];

    foreach ($weightLogs as $log) {
        // Use timestamp of weight log date as feature
        $features[] = [strtotime($log['date'])];

        // Use weight as label for daily prediction
        $labels[] = $log['weight'];
    }

    // Train the model (using linear regression)
    $regression = new LeastSquares();
    $regression->train($features, $labels);

    // Predict next day's weight and date
    $nextDayTimestamp = strtotime('+1 day', end($features)[0]);
    $predictedWeight = $regression->predict([[$nextDayTimestamp]]);

    // echo "<h3>Predicted Weight for Tomorrow:</h3> ";
    // echo "Predicted Date: " . date('Y-m-d', $nextDayTimestamp) . "<br>";
    // echo "Predicted Weight: " . round($predictedWeight[0], 1) . " kg<br>";

    $predictionData = [
        'predicted_date' => date('Y-m-d', $nextDayTimestamp),
        'predicted_weight' => round($predictedWeight[0], 1)
    ];

    header('Content-Type: application/json');
    echo json_encode($predictionData);
}

?>
