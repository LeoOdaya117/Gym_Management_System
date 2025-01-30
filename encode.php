<?php

include("config.php");

$sql = "SELECT diet_plan FROM diet_plans WHERE user_id = '117'"; // You should modify this query based on your database structure

$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($result['diet_plan'])) {
        $serializedData = $result['diet_plan'];
        //echo $serializedData;
        // Unserialize the data
        $unserializedData = unserialize($serializedData);

        if ($unserializedData !== false) {
            // Now $unserializedData contains the unserialized data
            print_r($unserializedData);
        } else {
            echo "Error unserializing data.";
        }
    } else {
        echo "No diet plan found for the user.";
    }
} else {
    echo "Error executing the query: " . print_r($stmt->errorInfo(), true);
}

// Close the database connection
$conn = null;
?>
