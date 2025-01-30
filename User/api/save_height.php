<?php

include('../config.php');
include('../function.php');

$height = ""; // Initialize $weight with an empty string
$userId = $_POST['email'];

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
  echo "Empty Value";
}



// Close the PDO connection
$conn = null;
?>
