<?php
include('../config.php');
include('../function.php');
date_default_timezone_set('Asia/Manila');
if (!isset($_POST['email']) || !isset($_POST['weight'])) {
  echo "Error: Incomplete data provided";
  exit();
}

$email = $_POST['email'];
$weight = $_POST['weight'];
$date = date("Y-m-d");

try {
  // Get user ID using the email address
  $userId = getUserID($email);

  if (!$userId) {
    echo "Error: User not found";
    exit();
  }

  // Check if the user has already saved a weight log for today
  $selectQuery = "SELECT * FROM weightlog WHERE `userid` = ? AND `date` = ?";
  $selectStatement = $conn->prepare($selectQuery);
  $selectStatement->execute([$userId, $date]);

  if ($selectStatement->rowCount() > 0) {
    // User has already saved a weight log for today, update the existing record
    $updateQuery = "UPDATE weightlog SET `weight` = ? WHERE `userid` = ? AND `date` = ?";
    $updateStatement = $conn->prepare($updateQuery);
    $updateStatement->execute([$weight, $userId, $date]);

    // Also update the weight in the account table
    $accountUpdateQuery = "UPDATE `account` SET `weight` = ? WHERE `IdNum` = ?";
    $accountUpdateStatement = $conn->prepare($accountUpdateQuery);
    $accountUpdateStatement->execute([$weight, $userId]);

    echo "Success";
  } else {
    // User has not saved a weight log for today, insert a new record
    $insertQuery = "INSERT INTO weightlog (`userid`, `weight`, `date`) VALUES (?, ?, ?)";
    $insertStatement = $conn->prepare($insertQuery);
    $insertStatement->execute([$userId, $weight, $date]);

    // Also update the weight in the account table
    $accountUpdateQuery = "UPDATE `account` SET `weight` = ? WHERE `IdNum` = ?";
    $accountUpdateStatement = $conn->prepare($accountUpdateQuery);
    $accountUpdateStatement->execute([$weight, $userId]);

    echo "Success";
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close the PDO connection
$conn = null;
?>
