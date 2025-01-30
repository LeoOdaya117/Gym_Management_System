<?php
include("../config.php");

// Sanitize and escape the input values to prevent SQL injection
$username = $_POST['Email'] ?? null;
$Fname = $_POST['FirstName'] ?? null;
$Lname = $_POST['LastName'] ?? null;
$Age = intval($_POST['Age'] ?? 0); // Convert to integer, default to 0 if not set
$Gender = $_POST['Gender'] ?? null;
$Weight = floatval($_POST['Weight'] ?? 0.0); // Convert to float, default to 0.0 if not set
$Height = floatval($_POST['Height'] ?? 0.0); // Convert to float, default to 0.0 if not set

$stmt = $conn->prepare("UPDATE account SET `Firstname`=:fname, `Lastname`=:lname, `Age`=:age, `Gender`=:gender, `Weight`=:weight, `Height`=:height WHERE `Username`=:username");
$stmt->bindParam(':fname', $Fname);
$stmt->bindParam(':lname', $Lname);
$stmt->bindParam(':age', $Age);
$stmt->bindParam(':gender', $Gender);
$stmt->bindParam(':weight', $Weight);
$stmt->bindParam(':height', $Height);
$stmt->bindParam(':username', $username);

if( $stmt->execute()){
    echo "Success"; // Return success message

}
else{
    $stmt->error();
}
?>
