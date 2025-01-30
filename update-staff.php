<?php

include('config.php');

// Get form data
$id = $_POST['edit_id'];
$edit_last = $_POST["edit_last"];
$edit_first = $_POST["edit_first"];
$edit_username = $_POST["edit_username"];
$submitted_password = $_POST["edit_password"];
$hashpass = password_hash($submitted_password, PASSWORD_DEFAULT);
$same_pass = true;

// Check if password needs to be updated
if (!empty($submitted_password)) {
    $password_stmt = $conn->prepare("SELECT Password FROM account WHERE Idnum = :id");
    $password_stmt->bindParam(':id', $id);
    $password_stmt->execute();
    $user = $password_stmt->fetch(PDO::FETCH_ASSOC);

    if ($user['Password'] == $submitted_password) {
        $same_pass = true;
    }
    else{
        $same_pass = false;
    }
}

// Prepare the SQL statement
if ($same_pass) {
    $sql = "UPDATE account SET Firstname = ?, Lastname = ?, username = ? WHERE IdNum = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $edit_first);
    $stmt->bindParam(2, $edit_last);
    $stmt->bindParam(3, $edit_username);
    $stmt->bindParam(4, $id);
} else {
    $sql = "UPDATE account SET Firstname = ?, Lastname = ?, username = ?, Password = ? WHERE IdNum = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $edit_first);
    $stmt->bindParam(2, $edit_last);
    $stmt->bindParam(3, $edit_username);
    $stmt->bindParam(4, $hashpass);
    $stmt->bindParam(5, $id);
}

// Execute the statement
if ($stmt->execute()) {
    echo 'Success';
} else {
    echo 'Error: Unable to update data.';
}

?>
