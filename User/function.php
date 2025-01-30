<?php 



function getAdminID() {
    include('config.php'); 

    $AccountType = "Admin";
    $sql = "SELECT IdNum FROM account WHERE AccountType = :AccountType";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':AccountType', $AccountType, PDO::PARAM_STR);
    
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['IdNum']; 
    } else {
        return 'Not_Found';
    }
    
    $conn = null;
}

function getUserID($username) {
    include('config.php'); 

    $sql = "SELECT IdNum FROM account WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['IdNum']; 
    } else {
        return 'Not_Found';
    }
    
    $conn = null;
}





?>