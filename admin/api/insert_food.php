<?php
    include('config.php');

    $Food_Name = $_POST["Food_Name"];
    $description = $_POST["description"];
    $Serving = $_POST["Serving"];
    $Carb = $_POST["Carb"];
    $Fat = $_POST["Fat"];
    $Protein = $_POST["Protein"];
    $Calories = $_POST["Calories"];
    $Diet = $_POST["Diet"];
    $Meal = $_POST["Meal"];
    $image_link = $_POST["image_link"];
    
    
    // Check if the exercise name already exists in the database
    $check_query = "SELECT COUNT(*) FROM foods WHERE name = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->execute([$Food_Name]);
    $exercise_exists = $check_stmt->fetchColumn();

    if ($exercise_exists) {
        // Exercise name already exists, display an alert message
        echo 'Food already exists in the database. Please choose a different name.';
    } else {
        // Exercise name doesn't exist, proceed with insertion
        $sql = "INSERT INTO `foods`( `name`, `meal`, `diet`, `calories`, `protein`, `fat`, `carbohydrates`, `serving`,`description`, `photo`) VALUES (?,?,?,?,?,?,?,?,?,?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bindParam(1, $Food_Name);
            $stmt->bindParam(2, $Meal);
            $stmt->bindParam(3, $Diet);
            $stmt->bindParam(4, $Calories);
            $stmt->bindParam(5, $Protein);
            $stmt->bindParam(6, $Fat);
            $stmt->bindParam(7, $Carb);
            $stmt->bindParam(8, $Serving);
            $stmt->bindParam(9, $description);
            $stmt->bindParam(10, $image_link);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Success";
            } else {
                // Error in execution
                echo '"Error: Unable to add food."';
            }
        } else {
            // Error in preparing the statement
            echo 'Error:  Unable to prepare the SQL statement.';
        }
    }

    $conn = null; // Commented out since it might be closed in config.php
?>