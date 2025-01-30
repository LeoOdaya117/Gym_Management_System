<?php
    include('config.php');

    $exercise_name = $_POST["exercise_name"];
    $description = $_POST["description"];
    $set = $_POST["set"];
    $reps = $_POST["reps"];
    $duration = $_POST["duration"];
    // $calorie_burn_rate = $_POST["calorie_burn_rate"];
    // $muscle_building = $_POST["muscle_building"];
    $category_id = $_POST["category_id"];
    $Part_Of_Body = $_POST["Part_Of_Body"];
    $equipment = $_POST["equipment"];
    $difficulty = $_POST["difficulty"];
    $instructions = $_POST["instructions"];
    $image_url = $_POST["image_url"];
    $video_url = $_POST["video_url"];


    function generateUniqueId() {
        // Include your database connection
        include('config.php');
        
        // Query to get the total number of accounts
        $sql = "SELECT COUNT(*) AS total FROM Exercises";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalAccounts = $result['total'];
        
        // Close the database connection
        $conn = null;
        
        // Generate a unique ID based on total accounts and timestamp
        $uniqueId = str_pad($totalAccounts + 1, 3, '0', STR_PAD_LEFT);
    
    
    
        return $uniqueId;
    }
    // Check if the exercise name already exists in the database
    $check_query = "SELECT COUNT(*) FROM Exercises WHERE ExerciseName = ? AND PartOfBody=? AND Goal = ? AND Difficulty = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->execute([$exercise_name, $Part_Of_Body, $category_id, $difficulty]);
    $exercise_exists = $check_stmt->fetchColumn();

    if ($exercise_exists) {
        // Exercise name already exists, display an alert message
        echo '"Exercise already exists in the database. Please choose a different exercise."';
        
    }
    else {
        $sql = "INSERT INTO Exercises (ExerciseName, Description,`set`, reps, duration, Goal, PartOfBody, EquipmentID, Difficulty, Instructions, ImageURL, VideoURL)
                VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bindParam(1, $exercise_name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $set);
            $stmt->bindParam(4, $reps);
            $stmt->bindParam(5, $duration);
            // $stmt->bindParam(3, $calorie_burn_rate);
            // $stmt->bindParam(4, $muscle_building);
            $stmt->bindParam(6, $category_id);
            $stmt->bindParam(7, $Part_Of_Body);
            $stmt->bindParam(8, $equipment);
            $stmt->bindParam(9, $difficulty);
            $stmt->bindParam(10, $instructions);
            $stmt->bindParam(11, $image_url);
            $stmt->bindParam(12, $video_url);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Success";
                exit; 
            } else {
               
                echo 'Error: Unable to add exercise.';
                
            }
        } else {
            echo 'Error:  Unable to prepare the SQL statement.';
           
        }
    }

$conn = null; // Commented out since it might be closed in config.php
?>
