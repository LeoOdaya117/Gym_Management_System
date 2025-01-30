<?php
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
}

include('config.php');

$weight = ""; // Initialize $weight with an empty string
$userId = $_SESSION['Username'];

if (isset($_POST['weight'])) {
  $weight = $_POST['weight'];

  $date = date("Y-m-d");

  // Insert the weight into the WeightLog table
  $query = "INSERT INTO weightlog (`userid`, `weight`, `date`) VALUES ('$userId', '$weight', '$date')";
  $result = $conn->query($query);

  if ($result) {
    echo "Weight saved successfully!";
    $query = "UPDATE `account` SET `weight`= $weight WHERE `Username` = $userId ";
    $result = $conn->query($query);
  } else {
    echo "Error saving weight: " . $conn->error;
  }
}
else{
  echo "No Value";
}



// Close the PDO connection
$conn = null;
?>
