<?php

include('../config.php');
session_start();

// if($_SESSION['Accounttype'] != 'Admin'){
//     header("Location: ../pages-login.html");
//     exit();
// }

$query = "SELECT `membershipid`, `FullName`, `dueDate` FROM membership WHERE `membershiptype` = '1'";

$stmt=$conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($result );




?>