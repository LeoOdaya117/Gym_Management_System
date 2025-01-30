<?php

include('../config.php');
session_start();

// if($_SESSION['Accounttype'] != 'Admin'){
//     header("Location: ../pages-login.html");
//     exit();
// }

$query = "SELECT COUNT(*) AS total FROM membership WHERE `membershiptype` = '1'";

$stmt=$conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$totalAccounts = $result['total'];

$currentDate = date('Ymd');
echo 'WALKIN'. $currentDate . strval($totalAccounts + 1) ;




?>