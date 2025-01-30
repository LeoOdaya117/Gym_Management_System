<?php
session_start();
include('../config.php');



$userId = $_POST  ['Username'];

// Use PDO for database operations
try {
  // Fetch user details from the database using prepared statement
  $stmt = $conn->prepare("SELECT `Height`,`BMI`,`Weight`, `goalweight`, `fitnessGoal` FROM account WHERE Username = :userId");
  $stmt->bindParam(':userId', $userId);
  $stmt->execute();

  // Fetch the result as an associative array
  $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

  // Check if user details are found
  if ($userDetails) {
    // Send the user details as JSON
    echo json_encode($userDetails);
  } else {
    // No user details found, return a not found response
    http_response_code(404); // Not Found
    echo json_encode(['error' => 'User not found']);
  }
  
} catch (PDOException $e) {
  // Handle database connection or query errors
  http_response_code(500); // Internal Server Error
  echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
  // Close the database connection
  $conn = null;
}
?>
