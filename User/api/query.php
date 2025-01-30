<?php 

include("../config.php");
$sql = "SELECT `ExerciseName` FROM exercises ";
$stmt = $conn->prepare($sql);

$stmt->execute();
$exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($exercises);

?>