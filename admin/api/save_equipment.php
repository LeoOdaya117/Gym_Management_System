<?php
    include('config.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $equipment_name = $_POST["equipment_name"];
        $description = $_POST["description"];
        $image_url = $_POST["image_url"];

        if ($equipment_name != null || $description != null || $image_url != null){
                    // Check if the exercise name already exists in the database
            $check_query = "SELECT COUNT(*) FROM Equipment WHERE equipmentName = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->execute([$equipment_name]);
            $equipment_exists = $check_stmt->fetchColumn();

            if ($equipment_exists) {
                // Exercise name already exists, display an alert message
                echo 'Equipment name already exists in the database. Please choose a different name.';
            } else {
                // Exercise name doesn't exist, proceed with insertion
                $sql = "INSERT INTO Equipment (`equipmentName`, `equipmentDescription`, `image`)
                        VALUES (?, ?, ?)";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    // Bind parameters and execute the statement
                    $stmt->bindParam(1, $equipment_name);
                    $stmt->bindParam(2, $description);
                    $stmt->bindParam(3, $image_url);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "Success";
                        
                    } else {
                        // Error in execution
                        echo 'Error: Unable to add equipment.';
                        
                    }
                } else {
                    // Error in preparing the statement
                    echo 'Error: ' . $stmt->error;
                    
                }
            }
        }else{
            echo 'Error: Unable to add equipment.';
        }


    }

    $conn = null;

?>
