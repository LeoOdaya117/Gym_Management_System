<?php
include('config.php');

    $id = $_POST['exerciseid'];
    $exercise_name = $_POST["edit_exercise_name"];
    $description = $_POST["edit_description"];
//   $calorie_burn_rate = $_POST["edit_calorie_burn_rate"];
//   $muscle_building = $_POST["edit_muscle_building"];
    $category_id = $_POST["edit_category_id"];
    $edit_set = $_POST["edit_set"];
    $edit_reps = $_POST["edit_reps"];
    $edit_duration = $_POST["edit_duration"];
    $Part_Of_Body = $_POST["edit_Part_Of_Body"];
    $equipment = $_POST["edit_equipment"];
    $difficulty = $_POST["edit_difficulty"];
    $instructions = $_POST["edit_instructions"];
    $image_url = $_POST["edit_image_url"];
    $video_url = $_POST["edit_video_url"];

    // Update the exercise record in the database
    $sql = "UPDATE exercises SET ExerciseName=?, Description=?, `set`=?, `reps`=?, `duration`=?, Goal=?, PartOfBody=?, EquipmentID=?, Difficulty=?, Instructions=?, ImageURL=?, VideoURL=? WHERE ExerciseID=?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(1, $exercise_name);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $edit_set);
        $stmt->bindParam(4, $edit_reps);
        $stmt->bindParam(5, $edit_duration);
        $stmt->bindParam(6, $category_id);
        $stmt->bindParam(7, $Part_Of_Body);
        $stmt->bindParam(8, $equipment);
        $stmt->bindParam(9, $difficulty);
        $stmt->bindParam(10, $instructions);
        $stmt->bindParam(11, $image_url);
        $stmt->bindParam(12, $video_url);
        $stmt->bindParam(13, $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Exercise updated successfully, show SweetAlert
            echo 'Success';
            exit;
        } else {
            // Error in execution, show SweetAlert for error
            echo 'Error: Unable to update exercise.';
        }
    
    } else {
        // Error in preparing the statement
        echo $stmt->errorInfo();
    }

// Close the database connection (if it's opened elsewhere in config.php)
$conn = null; // Commented out since it might be closed in config.php
?>