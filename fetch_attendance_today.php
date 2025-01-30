<?php
include('config.php');
date_default_timezone_set('Asia/Manila');
$selectedDate =  date('Y-m-d');

// Prepare the SQL statement to fetch attendance data for the selected date
$sql = "SELECT * FROM attendance WHERE DATE(timeIn) = :selectedDate";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':selectedDate', $selectedDate);
$stmt->execute();

$attendanceData = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($attendanceData); // Return the attendance data as JSON
?>
