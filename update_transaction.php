<?php
include('config.php');
session_start();

$walkin_id = $_POST['walkinid'];
$walkin_name = $_POST['walkinname'];

$user_id = $_POST['user_id'];
$subscriptionName = null;
$subscriptionName = $_POST['subscriptionName'];


$subscriptionPrice = $_POST['subscriptionPrice'];
$sales_id = $_POST['transactionNo'];
$cashAmount = $_POST['cashAmount'];
$changeAmount = $_POST['changeAmount'];
date_default_timezone_set('Asia/Manila');
$paymentDate = date('Y-m-d H:i:s');
$user = $_SESSION['IdNum'];
$status = "Complete";
$paymentMethod = "Cash";
$subscriptionID = getSubsID($subscriptionName);

if($subscriptionName == null){
    echo "Choose a Susbscription plan!";
    exit;
}
if($cashAmount == null && $changeAmount == null){
    echo "Input the Cash amount!";
    exit;
}

if($changeAmount < 0){
    echo "Input the Correct amount!";
    exit;
}






if($user_id == null && $walkin_id == null){
    // Update sales table
    $sql = "UPDATE `sales` SET   `subscriptionID` = :subscriptionID, `price` = :price, `payment` = :cashAmount, `changeMoney` = :changeAmount, `payment_date` = :paymentDate, `User` = :user, `status` = :status WHERE `salesID` = :sales_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':subscriptionID', $subscriptionID);
    $stmt->bindParam(':price', $subscriptionPrice);
    $stmt->bindParam(':cashAmount', $cashAmount);
    $stmt->bindParam(':changeAmount', $changeAmount);
    $stmt->bindParam(':paymentDate', $paymentDate);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':sales_id', $sales_id);
    if (!$stmt->execute()) {
        echo "Error updating sales table: " . $stmt->errorInfo()[2];
        exit;
    }

    // Fetch sales data including subscriptionName
    $sql = "SELECT sa.*, s.subscriptionName
            FROM sales AS sa
            INNER JOIN subscription AS s ON sa.subscriptionID = s.id
            WHERE sa.salesID = :sales_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':sales_id', $sales_id);
    if (!$stmt->execute()) {
        echo "Error fetching sales data: " . $stmt->errorInfo()[2];
        exit;
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        echo "No sales data found for salesID: $sales_id";
        exit;
    }

    $UserID = $row['IdNum'];
   
}
elseif($walkin_id != null && $walkin_name != null){
    $UserID = $walkin_id;

    $sql = "INSERT INTO `sales`(`salesID`, `IdNum`, `subscriptionID`, `price`, `status`, `paymentMethod`, `payment`, `changeMoney`, `date_created`, `payment_date`, `User`) VALUES (:salesID, :IdNum, :subscriptionID, :price, :status, :paymentMethod, :payment, :changeMoney, :date_created, :payment_date, :User)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':salesID', $sales_id);
    $stmt->bindParam(':IdNum', $UserID);
    $stmt->bindParam(':subscriptionID', $subscriptionID);
    $stmt->bindParam(':price', $subscriptionPrice);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':paymentMethod', $paymentMethod);
    $stmt->bindParam(':payment', $cashAmount);
    $stmt->bindParam(':changeMoney', $changeAmount);
    $stmt->bindParam(':date_created', $paymentDate);
    $stmt->bindParam(':payment_date', $paymentDate);
    $stmt->bindParam(':User', $user);

    if (!$stmt->execute()) {
        echo "Error Inserting to sales table: " . $stmt->errorInfo()[2];
        exit;
    }
   
}
else{

    $UserID = $user_id;
    $sql = "INSERT INTO `sales`(`salesID`, `IdNum`, `subscriptionID`, `price`, `status`, `paymentMethod`, `payment`, `changeMoney`, `date_created`, `payment_date`, `User`) VALUES (:salesID, :IdNum, :subscriptionID, :price, :status, :paymentMethod, :payment, :changeMoney, :date_created, :payment_date, :User)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':salesID', $sales_id);
    $stmt->bindParam(':IdNum', $UserID);
    $stmt->bindParam(':subscriptionID', $subscriptionID);
    $stmt->bindParam(':price', $subscriptionPrice);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':paymentMethod', $paymentMethod);
    $stmt->bindParam(':payment', $cashAmount);
    $stmt->bindParam(':changeMoney', $changeAmount);
    $stmt->bindParam(':date_created', $paymentDate);
    $stmt->bindParam(':payment_date', $paymentDate);
    $stmt->bindParam(':User', $user);

    if (!$stmt->execute()) {
        echo "Error Inserting to sales table: " . $stmt->errorInfo()[2];
        
        exit;
    }

}



$user_plan = $subscriptionName;
$startDate = date('Y-m-d');
$dueDate = date('Y-m-d');
$memStatus = "Active";
$dueDate =setDueDate($user_plan, $startDate);

// Save to Membership table if user doesn't exist
$sql = "SELECT * FROM `membership` WHERE membershipid = :UserID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':UserID', $UserID);
if (!$stmt->execute()) {
    echo "Error retrieving user's membership information: " . $stmt->errorInfo()[2];
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user exists in the Membership table
if ($row) {
    $userExists = true;
    $userCurrentDueDate = $row['dueDate'];
    $currentDate = date('Y-m-d');

    if( $currentDate > $userCurrentDueDate){
        $currentDuedate =$currentDate;
    }else{
        $currentDuedate =$userCurrentDueDate;

    }

} else {
    $userExists = false;
}

if (!$userExists) {
    if($walkin_name != null){
        $membershiptype = '1';
        $sql = "INSERT INTO membership (`membershipid`,`FullName`, `plan`, `startDate`, `dueDate`, `status`, `membershiptype`)
            VALUES (:UserID, :FullName, :user_plan, :startDate, :dueDate, :memStatus, :membershiptype)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->bindParam(':FullName', $walkin_name);
        $stmt->bindParam(':user_plan', $user_plan);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':dueDate', $dueDate);
        $stmt->bindParam(':memStatus', $memStatus);
        $stmt->bindParam(':membershiptype', $membershiptype);
    }else{
        $sql = "INSERT INTO membership (`membershipid`, `plan`, `startDate`, `dueDate`, `status`)
        VALUES (:UserID,  :user_plan, :startDate, :dueDate, :memStatus)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->bindParam(':user_plan', $user_plan);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':dueDate', $dueDate);
        $stmt->bindParam(':memStatus', $memStatus);
    }
    
    if (!$stmt->execute()) {
        echo "Error inserting into Membership table: " . $stmt->errorInfo()[2];
        exit;
    }
}
else{

    $dueDate =setDueDate($user_plan, $currentDuedate);

    $sql = "UPDATE `membership` SET `plan` = :user_plan, `dueDate` = :dueDate WHERE `membershipid` = :membershipid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_plan', $user_plan);
    $stmt->bindParam(':dueDate', $dueDate);
    $stmt->bindParam(':membershipid', $UserID);
    if (!$stmt->execute()) {
        echo "Error updating sales table: " . $stmt->errorInfo()[2];
        exit;
    }

}

echo "Success";



function setDueDate($user_plan, $currentDuedate){

   
    include('config.php');

    try {
        $sql = "SELECT * FROM subscription WHERE subscriptionName = :user_plan";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_plan', $user_plan);
        if (!$stmt->execute()) {
            echo "Error fetching subscription duration: " . $stmt->errorInfo()[2];
            exit;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            $subscriptionDuration = $row['subscriptionName'];
    
            $dueDate = date('Y-m-d', strtotime($currentDuedate . ' + ' . $subscriptionDuration));
    
        } else {
            echo "Error: Subscription duration not found for plan '$user_plan'";
            exit;
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    

    return $dueDate;
}

function getSubsID($subsname){
    if($subsname == null ||$subsname == ""){
        return "Please Choose a subscription";

    }
    include('config.php');
    $sql = "SELECT `id` FROM subscription WHERE subscriptionName = :user_plan";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_plan', $subsname);
    if (!$stmt->execute()) {
        echo "Error fetching subscription duration: " . $stmt->errorInfo()[2];
        exit;
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $subsid = $row['id'];

    } else {
        echo "Error: Subscription duration not found for plan '$user_plan'";
        exit;
    }

    return $subsid;
}
?>
