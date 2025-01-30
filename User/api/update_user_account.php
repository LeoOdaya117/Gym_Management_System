<?php
    // Include the file containing the database connection
    include("../config.php");
    
    // Check if all expected POST parameters are set
    if(isset($_POST['email'], $_POST['Age'], $_POST['Gender'], $_POST['Weight'], $_POST['goalWeight'], $_POST['Height'], $_POST['BMR'], $_POST['fitnessGoal'])) {
        
        // Retrieve data from POST request
        $email = $_POST['email'];
        $Age = $_POST['Age'];
        $Gender = $_POST['Gender'];
        $Weight = $_POST['Weight'];
        $goalWeight = $_POST['goalWeight'];
        $Height = $_POST['Height'];
        $BMR = $_POST['BMR'];
        $fitnessGoal = $_POST['fitnessGoal'];

        // Prepare SQL statement to update user information
        $sql = "UPDATE account SET `Age`=?, `Gender`=?, `Weight`=?, `goalweight`=?, `Height`=?, `BMR`=?, `fitnessGoal`=? WHERE `Username` = ?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $Age, PDO::PARAM_INT);
        $stmt->bindParam(2, $Gender, PDO::PARAM_STR);
        $stmt->bindParam(3, $Weight, PDO::PARAM_INT);
        $stmt->bindParam(4, $goalWeight, PDO::PARAM_INT);
        $stmt->bindParam(5, $Height, PDO::PARAM_INT);
        $stmt->bindParam(6, $BMR, PDO::PARAM_INT);
        $stmt->bindParam(7, $fitnessGoal, PDO::PARAM_STR);
        $stmt->bindParam(8, $email, PDO::PARAM_STR);

        // Execute the SQL query
        if($stmt->execute()){
            echo "Success";
        } else {
            // Handle errors gracefully
            echo "Error updating user information: " . $stmt->errorInfo();
        }

    } else {
        // Some POST parameters are missing
        echo "Error: Incomplete POST data";
    }
?>
