<?php 
include('../config.php');
session_start();

// if (!isset($_SESSION['Username'])) {
//   header("Location: logout.php");
//   exit();
// }


if(isset($_GET["search"])){
  $search = $_GET["search"];
  // Using prepared statements to prevent SQL injection
  $sql = "SELECT `equipmentID`, `equipmentName`, `image` FROM equipment WHERE `equipmentName` LIKE :search GROUP BY `equipmentName` ORDER BY `equipmentName`";
  $stmt = $conn->prepare($sql);
  $stmt->execute(array(':search' => "%$search%")); // Bind the search term
} else {
  $sql = "SELECT `equipmentID`, `equipmentName`, `image` FROM equipment GROUP BY `equipmentName` ORDER BY `equipmentName`";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>