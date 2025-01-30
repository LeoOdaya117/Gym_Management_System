<?php 
include('../config.php');
session_start();

// if (!isset($_SESSION['Username'])) {
//   header("Location: logout.php");
//   exit();
// }

$workoutset = "";

if(isset($_GET["workoutset"])){
    $workoutset = urldecode($_GET["workoutset"]);
} else {
    exit(json_encode(array("error" => "Invalid item ID")));
}


$sql = "SELECT `ExerciseID`,`ExerciseName`,`set`,`reps`,`duration`,`Difficulty`, `ImageURL`, `VideoURL` FROM exercises WHERE `Workoutset` = :workoutset";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':workoutset', $workoutset, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    echo json_encode($result); // Encode the result if it's not empty
} else {
    echo json_encode(array("error" => "No data found for the given item ID and category")); // Return an error message if no data is found
}
?>
