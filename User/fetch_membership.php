<?php
    include('config.php');
    $query = "SELECT * FROM subscription WHERE `status` = 'Active' ORDER BY Price ASC ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $subscriptionPlans = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($subscriptionPlans);
?>