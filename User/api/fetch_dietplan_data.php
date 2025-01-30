<?php
session_start();

// if (!isset($_SESSION['Username'])) {
//   header("Location: pages-login.html");
//   exit();
// }

// Include your database configuration file
include("../config.php");
include("../function.php");
// Function to get the diet plan for the specified day
function getDietPlan($conn, $idNum, $dietPlanId, $day) {
    // Modify the query to join dietplan_details and foods tables
    $query = "SELECT f.id ,f.photo AS image, f.name AS name, f.meal AS mealtype, f.serving AS  PerServing , dd.Serving
              FROM dietplan dd
              INNER JOIN foods f ON dd.FoodID = f.id
              WHERE dd.IdNum = :idNum AND dd.DietPlanID = :dietPlanId AND dd.Day = :day";

    $statement = $conn->prepare($query);
    $statement->bindParam(':idNum', $idNum);
    $statement->bindParam(':dietPlanId', $dietPlanId);
    $statement->bindParam(':day', $day);
    $statement->execute();
    $dietPlan = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $dietPlan;
}

if(isset( $_GET['IdNum'])){
  $idNum = getUserID($_GET['IdNum']);
}
else{
  $idNum = $_SESSION['IdNum'];
}


// Fetch the diet plan ID and day from URL parameters
$dietPlanId = $_GET['dietplanid'];
$day = $_GET['day'];

// Fetch diet plan data for the specified day
$dietPlan = getDietPlan($conn, $idNum, $dietPlanId, $day);

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($dietPlan);
?>
