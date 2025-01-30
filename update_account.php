<?php

    $sql = "UPDATE account SET name=?, username=?, password=? WHERE Idnum=?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(1, $edit_name);
        $stmt->bindParam(2, $edit_username);
        $stmt->bindParam(3, $hashpass);
        $stmt->bindParam(4, $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Exercise updated successfully, show success message
            echo '<script>Swal.fire({
                icon: "success",
                title: "Successfully Updated",
                showConfirmButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "users_data.php";
                }
            });</script>';
        } else {
            // Error in execution, show error message
            echo '<script>Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error: Unable to update exercise."
            });</script>';
            
        }
    } else {
        // Error in preparing the statement, show error message
        echo '<script>Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error: Unable to prepare the SQL statement."
        });</script>';
        
    }
                
?>