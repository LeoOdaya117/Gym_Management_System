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
  $sql = "SELECT `id`, `name`, `serving`, `photo` FROM foods WHERE `name` LIKE :search GROUP BY `name` ORDER BY `name`";
  $stmt = $conn->prepare($sql);
  $stmt->execute(array(':search' => "%$search%")); // Bind the search term
} else {
  $sql = "SELECT `id`, `name`, `serving`, `photo` FROM foods GROUP BY `name` ORDER BY `name`";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>