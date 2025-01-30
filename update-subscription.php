<?php

    include('config.php');

    $id = $_POST['id'];
    $subscriptionName = $_POST['subscriptionName'];
    $subscriptionDescription = $_POST["subscriptionDescription"];
    $Price = $_POST["Price"];
    $numberOfDays = $_POST["numberOfDays"];
    $status ='Active';


    $sql = "UPDATE `subscription` SET `subscriptionName`=?,`subscriptionDescription`=?,`Price`=?,`numberOfDays`=?,`status`=? WHERE id=?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bindParam(1, $subscriptionName);
        $stmt->bindParam(2, $subscriptionDescription);
        $stmt->bindParam(3, $Price);
        $stmt->bindParam(4, $numberOfDays);
        $stmt->bindParam(5, $status);
        $stmt->bindParam(6, $id);

        if ($stmt->execute()) {
            echo 'Success';
            exit;
        } else {
            echo 'Error';
        }
    } else {
        echo $stmt->error;
    }

    $conn = null;
?>