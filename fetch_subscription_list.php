<?php 

    include('config.php');

    $sql = "SELECT * FROM subscription where `status` = 'Active'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $listofPlans = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($listofPlans);
?>