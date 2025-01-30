<?php 
include('../config.php');
session_start();

// if (!isset($_SESSION['Username'])) {
//   header("Location: logout.php");
//   exit();
// }

$search = "";

if(isset($_GET["workout"]) && isset($_GET["difficulty"])){
  $workout = $_GET["workout"];
  $difficulty = $_GET["difficulty"];

  if($workout == "warmup"){
    $sql = "SELECT `id`, `ExerciseName`, `Description`, `Equipment`, `ImageURL` FROM warm_up GROUP BY `ExerciseName`";
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
  }else{
    $sql = "SELECT `ExerciseID`, `ExerciseName`, `Description`, `EquipmentID`, `Difficulty`, `ImageURL` FROM exercises WHERE CategoryID = :workout AND Difficulty = :Difficulty ORDER BY ExerciseName";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':workout' => $workout, ':Difficulty' => $difficulty));
  }
  
}
else{
  if(isset($_GET["search"])){
    $search = $_GET["search"];
    // Using prepared statements to prevent SQL injection
    $sql = "SELECT `ExerciseID`, `ExerciseName`, `Description`, `EquipmentID`, `Difficulty`, `ImageURL` FROM exercises WHERE ExerciseName LIKE :search GROUP BY `ExerciseName` ORDER BY ExerciseName";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':search' => "%$search%")); // Bind the search term
  } else {
      $sql = "SELECT `ExerciseID`, `ExerciseName`, `Description`, `EquipmentID`, `Difficulty`, `ImageURL` FROM exercises  GROUP BY `ExerciseName` ORDER BY ExerciseName";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
  }

}


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>
