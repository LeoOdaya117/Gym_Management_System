<?php
session_start();
include("config.php");
include("user/function.php");
$email =  "";
$token =  "";
$newPassword = "";
$confirmPassword = "";
$current_password = "";
$userId = "";

if(isset($_POST["email"])){
    $email = $_POST["email"];
    $userId  = getUserID($email);
}else{
    $userId = $_SESSION['IdNum'];
}
if(isset($_POST["token"])){
    $token = $_POST["token"];
}
if(isset($_POST["edit_password"])){
    $newPassword = $_POST["edit_password"];
}
if(isset($_POST["edit_confirm_password"])){
    $confirmPassword = $_POST["edit_confirm_password"];
}

if(isset($_POST["current_password"])){
    $current_password = $_POST["current_password"];
}

// Check if current password matches the one in the database

$query = "SELECT Password FROM account WHERE Idnum = :userId";
$stmt = $conn->prepare($query);
$stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $hashedPassword = $user['Password'];

    if($current_password == null){
        if(mb_strlen($newPassword) < 6 || mb_strlen($confirmPassword) < 6){
            echo "Password must be at least 6 characters long.";
            exit;
        }
        

        if ($newPassword != $confirmPassword){
            echo "Password Does Not Match!";
        } else {
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE account SET Password = :newPassword WHERE Idnum = :userId";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bindValue(':newPassword', $newPassword, PDO::PARAM_STR);
            $updateStmt->bindValue(':userId', $userId, PDO::PARAM_INT);
            
            if ($updateStmt->execute()) {

                $updateQuery = "UPDATE password_reset SET used = 1 WHERE email = :email AND token = :token";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bindParam(':email', $email);
                $updateStmt->bindParam(':token', $token);
                $updateStmt->execute();
                echo "Success";
            } else {
                echo $updateStmt->errorInfo()[2];
            }
        }
    }else{
        if (password_verify($current_password, $hashedPassword)) {
            // Current password matches, proceed to change password
            if ($newPassword != $confirmPassword){
                echo "Password Does Not Match!";
            } else {
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE account SET Password = :newPassword WHERE Idnum = :userId";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bindValue(':newPassword', $newPassword, PDO::PARAM_STR);
                $updateStmt->bindValue(':userId', $userId, PDO::PARAM_INT);
                
                if ($updateStmt->execute()) {
                    echo "Success";
                } else {
                    echo $updateStmt->errorInfo()[2];
                }
            }
        } else {
            echo "Incorrect current password!";
        }
    }
    
} else {
    echo "User not found!";
}

?>
