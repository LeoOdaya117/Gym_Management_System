<?php
include("../config.php");
include("../function.php");

function getCurrentWorkoutPlan($conn, $idNum) {
    // Modify the query to select the diet plan with the latest DietPlanID
    $query = "SELECT WorkoutPlanID,DateCreated FROM workoutplan WHERE IdNum = :idNum ORDER BY WorkoutPlanID DESC LIMIT 1";

    $statement = $conn->prepare($query);
    $statement->bindParam(':idNum', $idNum);
    $statement->execute();
    $dietPlan = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $dietPlan;
}

// Function to get the previous diet plans
// Function to get the previous diet plans grouped by DietPlanID
function getPreviousWorkoutPlans($conn, $idNum) {
    // Query to fetch the previous diet plans grouped by DietPlanID
    // Assuming DateCreated represents the date when the diet plan was created
    $query = "SELECT WorkoutPlanID,DateCreated FROM workoutplan WHERE IdNum = :idNum AND WorkoutPlanID != (SELECT MAX(WorkoutPlanID) FROM workoutplan WHERE IdNum = :idNum) GROUP BY WorkoutPlanID ORDER BY WorkoutPlanID DESC";

    $statement = $conn->prepare($query);
    $statement->bindParam(':idNum', $idNum);
    $statement->execute();
    $previousDietPlans = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $previousDietPlans;
}


ob_start();
session_start();

if(isset($_GET['IdNum'])){
    $idNum = getUserID($_GET['IdNum']); // Assuming you have a session variable for the user's ID

}else{
    $idNum =  $_SESSION['IdNum'];

}
$currentWorkoutPlan = getCurrentWorkoutPlan($conn, $idNum);
$previousWorkoutPlans = getPreviousWorkoutPlans($conn, $idNum);

// Return the data in JSON format
$data = [
    'currentWorkoutPlan' => $currentWorkoutPlan,
    'previousWorkoutPlans' => $previousWorkoutPlans
];

header('Content-Type: application/json');
echo json_encode($data);
?>
