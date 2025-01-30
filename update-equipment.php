<?php

    include('config.php');

    $equipmentID = $_POST['equipmentID'];
    $equipmentName = $_POST['equipmentName'];
    $equipmentDescription = $_POST["equipmentDescription"];
    $image = $_POST["image"];



    $sql = "UPDATE `equipment` SET `equipmentName`=?,`equipmentDescription`=?,`image`=? WHERE equipmentID=?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bindParam(1, $equipmentName);
        $stmt->bindParam(2, $equipmentDescription);
        $stmt->bindParam(3, $image);
        $stmt->bindParam(4, $equipmentID);

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