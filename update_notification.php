<?php 

    ob_start();
    session_start();
    include('config.php');

    $user_id = $_SESSION['IdNum'];
    $category = null;
    $status = "Read";
    if(isset($_POST['category'])){
        $category = $_POST['category'];
    }

    $sql = "UPDATE `notifications` SET `status` = :status WHERE `messageCategory`= :category ";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':status',$status);
    $stmt->bindValue(':category',$category);
    // $stmt->bindValue(':user_id',$user_id);

    if($stmt->execute())
    {
        echo "Success";

    }
    else{
        echo $stmt->error;
    }





?>