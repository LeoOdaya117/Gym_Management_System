<?php 
include('../config.php');
session_start();

// if (!isset($_SESSION['Username'])) {
//   header("Location: logout.php");
//   exit();
// }

$search = "";

if(isset($_GET["search"])){
  $search = $_GET["search"];
  // Using prepared statements to prevent SQL injection
  $sql = "SELECT `ExerciseID`, `ExerciseName`, `Description`, `EquipmentID`, `Difficulty`, `ImageURL` FROM warm_up  WHERE ExerciseName LIKE :search GROUP BY `ExerciseName` ORDER BY ExerciseName";
  $stmt = $conn->prepare($sql);
  $stmt->execute(array(':search' => "%$search%")); // Bind the search term
} else {
  $sql = "SELECT `ExerciseID`, `ExerciseName`, `Description`, `EquipmentID`, `Difficulty`,`ImageURL` FROM warm_up GROUP BY `ExerciseName`";
  $stmt = $conn->prepare($sql);
  $stmt->execute(); 
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>
