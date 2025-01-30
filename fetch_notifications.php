<?php 

    include('config.php');

    $sql = "SELECT * FROM `notifications` WHERE `status` = 'Unread' order by notifDate DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($notifications); 

?>