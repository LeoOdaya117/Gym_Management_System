<?php
    include('config.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $subcription_name = $_POST["subcription_name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $days = $_POST["days"];
        $status = "Active";

        if ($subcription_name != null || $description != null || $price != null | $days != null){
                    // Check if the exercise name already exists in the database
            $check_query = "SELECT COUNT(*) FROM subscription WHERE subscriptionName = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->execute([$subcription_name]);
            $subcription_exists = $check_stmt->fetchColumn();

            if ($subcription_exists) {
                // Exercise name already exists, display an alert message
                echo 'Subcsription name already exists in the database. Please choose a different name.';
            } else {
                // Exercise name doesn't exist, proceed with insertion
                $sql = "INSERT INTO subscription (`subscriptionName`, `subscriptionDescription`, `Price`, `numberOfDays`, `status`)
                        VALUES (?, ?, ?, ?, ?)";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    // Bind parameters and execute the statement
                    $stmt->bindParam(1, $subcription_name);
                    $stmt->bindParam(2, $description);
                    $stmt->bindParam(3, $price);
                    $stmt->bindParam(4, $days);
                    $stmt->bindParam(5, $status);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "Success";
                        
                    } else {
                        // Error in execution
                        echo 'Error: Unable to add subcription.';
                        
                    }
                } else {
                    // Error in preparing the statement
                    echo 'Error: ' . $stmt->error;
                    
                }
            }
        }else{
            echo 'Error: Unable to add subcription.';
        }


    }

    $conn = null;

?>
