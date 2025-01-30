<?php

    include('config.php');

    $foodID = $_POST['foodID'];
    $name  = $_POST['name'];
    $diet  = $_POST['diet'];
    $meal = $_POST["meal"];
    $diet = $_POST["diet"];
    $calories = $_POST['calories'];
    $protein = $_POST["protein"];
    $fat = $_POST["fat"];
    $carbohydrates = $_POST["carbohydrates"];
    $serving = $_POST['serving'];
    $photo = $_POST["photo"];


    $sql = "UPDATE `foods` SET `name`=?,`meal`=?,`diet`=?,`calories`=?,`protein`=?,`fat`=?,`carbohydrates`=?,`serving`=?,`photo`=? WHERE id =?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $meal);
        $stmt->bindParam(3, $diet);
        $stmt->bindParam(4, $calories);
        $stmt->bindParam(5, $protein);
        $stmt->bindParam(6, $fat);
        $stmt->bindParam(7, $carbohydrates);
        $stmt->bindParam(8, $serving);
        $stmt->bindParam(9, $photo);
        $stmt->bindParam(10, $foodID);
        

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