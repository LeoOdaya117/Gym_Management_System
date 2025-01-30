<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $bmrValue = $_POST['bmr'];
    $dctValue = $_POST['dailyCalories'];
    $actLvlValue = $_POST['activityLevel'];
    $usernameValue = $_SESSION['Username'];

 

    // Prepare the SQL update statement
    $sql = "UPDATE `account` SET `BMR` = ?, `DCT` = ?, `ActLvl` = ? WHERE Username = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bindParam(1, $bmrValue);
        $stmt->bindParam(2, $dctValue);
        $stmt->bindParam(3, $actLvlValue);
        $stmt->bindParam(4, $usernameValue);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "No records were updated.";
        }
    }
   


}
?>
