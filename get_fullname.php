<?php
    include('config.php');

    $userID = "";

    if(isset($_POST['userID'])){
        $userID = $_POST['userID'];
    }

    // Fetch user details and membership information using JOIN
    $query = "
        SELECT 
            a.*, 
            m.membershipid, 
            m.plan, 
            m.startDate, 
            m.dueDate, 
            m.status 
        FROM 
            account a
        JOIN 
            membership m ON a.IdNum = m.membershipid
        WHERE 
            a.IdNum = :userId
    ";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($result) {
        // Return user details along with membership information as JSON response
        echo json_encode($result);
    } else {
        // User not found
        echo json_encode(["error" => "User currently don't have Subscription."]);
    }
?>
