<?php

include('../config.php');
include('../function.php');

if(isset($_GET['email']) && $_GET['email'] != "null"){
    $username = $_GET['email'];
} else {
    echo 'Please provide an email or contact the developer to resolve this problem.';
    exit;
}

$IdNum = getUserID($username); 

// // Query to check if there is a record of a workout plan for the given email
// $queryWorkout = "SELECT COUNT(*) AS count FROM workoutplan WHERE IdNum = :IdNum";
// $statementWorkout = $conn->prepare($queryWorkout);
// $statementWorkout->bindParam(':IdNum', $IdNum);
// $statementWorkout->execute();
// $countWorkout = $statementWorkout->fetchColumn();

// Query to check if there is a record of a diet plan for the given email
$queryDiet = "SELECT COUNT(*) AS count FROM dietplan WHERE IdNum = :IdNum";
$statementDiet = $conn->prepare($queryDiet);
$statementDiet->bindParam(':IdNum', $IdNum);
$statementDiet->execute();
$countDiet = $statementDiet->fetchColumn();

// Check if either a workout plan or a diet plan exists for the user
if ($countDiet > 0) {
    echo "Yes";
} else {
    echo "No";
}

?>
