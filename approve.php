<?php 

session_start();
include("config.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("UPDATE account SET status = 'Active' WHERE IdNum = :id");
    $stmt->bindParam(':id', $id);
    
    if($stmt->execute()){
        echo "success";
    }
    else{
        echo "Invalid action!";
    }

} else {
    echo "Invalid request!";
}


?>