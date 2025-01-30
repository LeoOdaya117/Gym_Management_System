<?php
session_start();

if (!isset($_SESSION['Username'])) {
  // Redirect or handle unauthorized access
  exit();
}

include('config.php');

$userId = $_SESSION['Username']; // Replace with your actual session variable

// Use PDO for database operations
try {


  // Fetch user details from the database using prepared statement
  $stmt = $conn->prepare("SELECT `weight`, height ,dct, goalweight, fitnessgoal, bmi FROM account WHERE Username = :userId");
  $stmt->bindParam(':userId', $userId);
  $stmt->execute();

  // Fetch the result as an associative array
  $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

  // Send the response as JSON
  echo json_encode($userDetails);
} catch (PDOException $e) {
  // Handle database connection or query errors
  echo json_encode(['error' => $e]);
} finally {
  // Close the database connection
  $conn = null;
}
?>
