<?php

include('config.php');
date_default_timezone_set('Asia/Manila');
function total_admin($conn){
    $sql = "SELECT * FROM account where AccountType='Admin'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count; 
}

function total_users($conn){
    $sql = "SELECT * FROM account where AccountType='User' AND status = 'Active'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count; 
}

function total_exercises($conn){
    $sql = "SELECT * FROM exercises";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count; 
}

function total_foods($conn){
    $sql = "SELECT * FROM foods";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count; 
}

function total_pending_registration($conn){
    $sql = "SELECT * FROM account where `status` = 'Pending'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count; 
}

function total_pending_request($conn){
    $sql = "SELECT * FROM sales where `status` = 'Pending'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count; 
}

function today_sales_sum($conn){
    // Get the current date
    $today = date("Y-m-d");

    // SQL query to calculate the sum of sales amounts for today's sales
    $sql = "SELECT SUM(price) AS total_sales FROM sales WHERE DATE(payment_date) = :today AND `status` = 'Complete'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':today', $today);
    $stmt->execute();
    
    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Get the total sales amount
    $total_sales = (float) $result['total_sales'];
    
    // Return the total sales amount
    if(!isset($total_sales)){
        return '0.00'; 
    }
    else{
        
        return  number_format($total_sales, 2);
        
    }
    
}

function this_month_sum($conn){
    $month = idate("m");
    $thismonthsales = 0;
    $sql = "SELECT SUM(price) as thisMonthSales FROM sales WHERE MONTH(payment_date) = :todaysMonth AND `status` = 'Complete'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':todaysMonth', $month);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $thismonthsales = (float) $result['thisMonthSales'];

    if(!isset($thismonthsales)){
        return '0.00'; 
    }
    else{
        
        return  number_format($thismonthsales, 2);
        
    }
}


function present_Today($conn){
    $sql = "SELECT * FROM attendance where DATE(timeIn) = CURDATE()";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count; 
}

$data = [
    'today_sales_sum' => today_sales_sum($conn),
    'this_month_sum' => this_month_sum($conn),
    'total_users' => total_users($conn),
    'total_pending_registration' => total_pending_registration($conn),
    'total_pending_request' => total_pending_request($conn),
    'present_Today' => present_Today($conn),
    
];


// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);



?>
