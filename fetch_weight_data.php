<?php
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
}

include('config.php');

// Fetch weight data from the WeightLog table
$query = "SELECT weight, date FROM WeightLog WHERE userid = :userId ORDER BY date ASC";
$stmt = $conn->prepare($query);
$stmt->bindParam(':userId', $_SESSION['Username']); // Assuming 'Username' is the user ID
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
