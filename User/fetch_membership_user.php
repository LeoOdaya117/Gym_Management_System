<?php 

include("config.php");
include("function.php");
if(isset($_GET["Username"])){
    $Username = $_GET["Username"];
}

$idnum = getUserID($Username);


$query = "SELECT * FROM membership WHERE membershipid = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $idnum); // Using the placeholder index 1 for the first parameter

$stmt->execute();
$membership = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($membership);

?>