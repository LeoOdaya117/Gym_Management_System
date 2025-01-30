<?php
session_start();
include('../config.php');
include("../function.php");

$ID = getUserID($_POST['email']);
// Fetch weight data from the WeightLog table
$query = "SELECT weight, date FROM WeightLog WHERE userid = :userId ORDER BY date DESC";
$stmt = $conn->prepare($query);
$stmt->bindParam(':userId', $ID); // Assuming 'Username' is the user ID
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare data for JSON response
$response = [
  'weights' => array_column($result, 'weight'),
  'dates' => array_column($result, 'date')
];

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
