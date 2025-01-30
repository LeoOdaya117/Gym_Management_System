<?php
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
}

include('config.php');

$height = ""; // Initialize $weight with an empty string
$userId = $_SESSION['Username'];

if (isset($_POST['height'])) {
  $height = $_POST['height'];

  // Insert the weight into the WeightLog table
  $query = "UPDATE `account` SET `height`= $height WHERE `Username` = '$userId' ";
  $result = $conn->query($query);


  if ($result) {
    echo "Success";
  } else {
    echo "Error saving height: " . $conn->error;
  }
}
else{
  echo "Error: Please input a Value.";
}



// Close the PDO connection
$conn = null;
?>
