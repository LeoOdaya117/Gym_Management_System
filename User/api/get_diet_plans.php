<?php
include("../config.php");
include("../function.php");
// Function to get the current diet plan
// Function to get the current diet plan
// Function to get the current diet plan
// Function to get the current diet plan
function getCurrentDietPlan($conn, $idNum) {
    // Modify the query to select the diet plan with the latest DietPlanID
    $query = "SELECT DietPlanID FROM dietplan WHERE IdNum = :idNum ORDER BY DietPlanID DESC LIMIT 1";
    $statement = $conn->prepare($query);
    $statement->bindParam(':idNum', $idNum);
    $statement->execute();
    $dietPlan = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $dietPlan;
}

// Function to get the previous diet plans
// Function to get the previous diet plans grouped by DietPlanID
function getPreviousDietPlans($conn, $idNum) {
    // Query to fetch the previous diet plans grouped by DietPlanID
    // Assuming DateCreated represents the date when the diet plan was created
    $query = "SELECT DietPlanID FROM dietplan WHERE IdNum = :idNum AND DietPlanID != (SELECT MAX(DietPlanID) FROM dietplan WHERE IdNum = :idNum) GROUP BY DietPlanID ORDER BY DietPlanID DESC";

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
    // $idNum =  $_SESSION['IdNum'];

}
$currentDietPlan = getCurrentDietPlan($conn, $idNum);
$previousDietPlans = getPreviousDietPlans($conn, $idNum);

// Return the data in JSON format
$data = [
    'currentDietPlan' => $currentDietPlan,
    'previousDietPlans' => $previousDietPlans
];

header('Content-Type: application/json');
echo json_encode($data);
?>
