<?php 
include('../config.php');
session_start();

// if (!isset($_SESSION['Username'])) {
//   header("Location: logout.php");
//   exit();
// }

$itemid = "";
$category = "";

if(isset($_GET["itemId"])){
    $itemid = $_GET["itemId"];
} else {
    exit(json_encode(array("error" => "Invalid item ID")));
}

if(isset($_GET["category"])){
    $category = $_GET["category"];
} else {
    exit(json_encode(array("error" => "Invalid Category")));
}

if($category == "exercise"){
    $sql = "SELECT `ExerciseName`, `Description`, `Instructions`, `VideoURL`, `EquipmentID`  FROM exercises WHERE ExerciseID = $itemid";
}
elseif($category == "warmup"){
    $sql = "SELECT `ExerciseName`, `Description`, `Instructions`, `VideoURL`  FROM `warm_up` WHERE `ExerciseID` = $itemid";
} elseif($category == "food"){    
    $sql = "SELECT `id`,`name`,`description`, `calories`, `protein`, `fat`, `carbohydrates` FROM `foods` WHERE id = $itemid";
} elseif($category == "equipment"){    
    $sql = "SELECT `equipmentDescription`, `image` FROM `equipment` WHERE equipmentID = $itemid";
} else {
    exit(json_encode(array("error" => "Invalid category")));
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() instead of fetchAll()

if ($result) {
    echo json_encode($result); // Encode the result if it's not empty
} else {
    echo json_encode(array("error" => "No data found for the given item ID and category")); // Return an error message if no data is found
}
?>
