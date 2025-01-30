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

$id = getID($_GET['username']);
$username = $_GET['username'];

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

// Function to fetch attendance count for each week
function fetchAttendanceCount($id, $startDate, $endDate) {
    global $conn;
    $attendanceCountQuery = "SELECT COUNT(*) AS attendance_count, DATE(timeIn) AS attendance_date
                             FROM `attendance`
                             WHERE `user_id` = :id
                             AND `timeIn` >= :startDate
                             AND `timeIn` <= :endDate
                             GROUP BY DATE(timeIn)";
    $attendanceCountStmt = $conn->prepare($attendanceCountQuery);
    $attendanceCountStmt->bindParam(':id', $id);
    $attendanceCountStmt->bindParam(':startDate', $startDate);
    $attendanceCountStmt->bindParam(':endDate', $endDate);
    $attendanceCountStmt->execute();
    return $attendanceCountStmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get the current date
$currentDate = date('Y-m-d');

// Fetch weight logs for the last 6 months
$sixMonthsAgo = date('Y-m-d', strtotime('-6 months', strtotime($currentDate)));
$weightLogs = fetchWeightLogs($id, $sixMonthsAgo, $currentDate);

// Prepare array to store weekly data
$weeklyData = [];

// Calculate weekly averages and attendance counts
foreach ($weightLogs as $log) {
    $logDate = strtotime($log['date']);
    $weekStart = date('Y-m-d', strtotime('last Monday', $logDate));
    
    if (!isset($weeklyData[$weekStart])) {
        $weeklyData[$weekStart] = [
            'weights' => [],
            'attendanceCount' => 0
        ];
    }
    
    $weeklyData[$weekStart]['weights'][] = $log['weight'];
}

// Fetch attendance counts for each week and accumulate the total count
$attendanceCounts = fetchAttendanceCount($id, $sixMonthsAgo, $currentDate);

foreach ($attendanceCounts as $attendance) {
    $attendanceDate = $attendance['attendance_date'];
    $weekStart = date('Y-m-d', strtotime('last Monday', strtotime($attendanceDate)));
    
    if (isset($weeklyData[$weekStart])) {
        $weeklyData[$weekStart]['attendanceCount'] += $attendance['attendance_count'];
    }
}

// Output the table with weekly data including attendance count
echo '<table border="1">';
echo '<tr><th>Week Start</th><th>Average Weight (kg)</th><th>Attendance Count</th></tr>';

foreach ($weeklyData as $weekStart => $data) {
    $averageWeight = count($data['weights']) > 0 ? array_sum($data['weights']) / count($data['weights']) : 0;
    $attendanceCount = isset($data['attendanceCount']) ? $data['attendanceCount'] : 0;

    echo '<tr>';
    echo '<td>' . $weekStart . '</td>';
    echo '<td>' . round($averageWeight, 1) . '</td>';
    echo '<td>' . $attendanceCount . '</td>';
    echo '</tr>';
}

echo '</table>';

// Display a new table for weight logs only
echo '<h2>Weight Logs</h2>';
echo '<table border="1">';
echo '<tr><th>Date</th><th>Weight (kg)</th></tr>';

foreach ($weightLogs as $log) {
    echo '<tr>';
    echo '<td>' . $log['date'] . '</td>';
    echo '<td>' . $log['weight'] . '</td>';
    echo '</tr>';
}

echo '</table>';

?>
