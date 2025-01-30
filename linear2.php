<?php

require 'vendor/autoload.php';
include 'config.php';

use Phpml\Regression\LeastSquares;

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
    
    $conn = null;
}

$id = getID($_GET['username']);
$username = $_GET['username'];

if($id == "Not_Found"){
    echo getID($_GET['username']);
    exit;
}

$weightLogsQuery = "SELECT 
                        DATE(`date`) AS `week_start_date`, 
                        AVG(`weight`) AS `average_weight` 
                    FROM 
                        `weightlog` 
                    WHERE 
                        `userid` = :id 
                        AND `date` >= DATE_SUB(CURRENT_DATE, INTERVAL 6 MONTH) 
                        AND `date` <= CURRENT_DATE 
                    GROUP BY 
                        YEARWEEK(`date`) 
                    ORDER BY 
                        `week_start_date` ASC";
$weightLogsStmt = $conn->prepare($weightLogsQuery);
$weightLogsStmt->bindParam(':id', $id);
$weightLogsStmt->execute();
$weightLogs = $weightLogsStmt->fetchAll(PDO::FETCH_ASSOC);

$attendanceQuery = "SELECT `timeIn` FROM `attendance` WHERE `user_id` = :username AND `timeIn` >= DATE_SUB(CURRENT_DATE, INTERVAL 6 MONTH) AND `timeIn` <= CURRENT_DATE ORDER BY `timeIn` ASC";
$attendanceStmt = $conn->prepare($attendanceQuery);
$attendanceStmt->bindParam(':username', $id);
$attendanceStmt->execute();
$attendanceData = $attendanceStmt->fetchAll(PDO::FETCH_ASSOC);

// Debugging
echo "User ID: " . $id . "<br>";
echo "Username: " . $username . "<br>";
echo "Weight Logs Count: " . count($weightLogs) . "<br>";
echo "Attendance Data Count: " . count($attendanceData) . "<br>";

if (!empty($weightLogs) && !empty($attendanceData)) {
    // Calculate features and labels
    $features = [];
    $labels = [];
    $firstTimestamp = strtotime($weightLogs[0]['week_start_date']);
    foreach ($weightLogs as $log) {
        // Features: Number of weeks since the first weight log and number of exercise days in the week
        $timestamp = strtotime($log['week_start_date']);
        $weeksSinceStart = floor(($timestamp - $firstTimestamp) / (7 * 24 * 60 * 60)) + 1;

        // Calculate number of exercise days in the week
        $exerciseDays = 0;
        foreach ($attendanceData as $attendance) {
            $attendanceTimestamp = strtotime($attendance['timeIn']);
            $attendanceWeek = floor(($attendanceTimestamp - $firstTimestamp) / (7 * 24 * 60 * 60)) + 1;
            if ($attendanceWeek == $weeksSinceStart) {
                $exerciseDays++;
            }
        }

        $features[] = [$weeksSinceStart, $exerciseDays];

        // Labels: Current weight
        $labels[] = $log['average_weight'];
    }

    echo "<h2>Generated dummy data:</h2>\n";
    echo "<h3>Weight Logs:</h3>\n";
    echo "<table border='1'>\n";
    echo "<tr><th>Week Start Date</th><th>Average Weight (kg)</th><th>Exercise Days</th></tr>\n";
    foreach ($weightLogs as $index => $log) {
        echo "<tr>";
        echo "<td>{$log['week_start_date']}</td>";
        echo "<td>{$log['average_weight']} kg</td>";
        echo "<td>{$features[$index][1]}</td>"; 
        echo "</tr>\n";
    }
    echo "</table>\n";

    if (!empty($features) && !empty($labels)) {
        // Train the model (using linear regression)
        $regression = new LeastSquares();
        $regression->train($features, $labels);

        // Predict next week's weight and date
        $nextWeekNumber = count($weightLogs) + 1;
        $nextWeekDate = date('Y-m-d', strtotime('+1 week', strtotime($weightLogs[count($weightLogs) - 1]['week_start_date'])));
        $predictedWeight = $regression->predict([$nextWeekNumber, 0]); // Assuming no attendance data for the current week

        // Analyze the trend based on recent weight changes
        $lastTwoWeeksWeight = $weightLogs[count($weightLogs) - 1]['average_weight'];
        $penultimateWeeksWeight = $weightLogs[count($weightLogs) - 2]['average_weight'];
        $trend = ($lastTwoWeeksWeight > $penultimateWeeksWeight) ? 'gaining' : (($lastTwoWeeksWeight < $penultimateWeeksWeight) ? 'losing' : 'maintaining');

        echo "<h3>Predicted Weight for Next Week based on Last Weight Log:</h3> ";
        echo "Predicted Date: " . $nextWeekDate . "<br>";
        echo "Predicted Weight: " . round($predictedWeight, 1) . " kg<br>";
        echo "Trend: The user is " . $trend . " weight\n";
    } else {
        echo "Error: Empty features or labels arrays.";
    }
} else {
    echo "Error: Empty weightLogs or attendanceData arrays.";
}

?>
