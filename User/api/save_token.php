<?php

// Include the database configuration
include('../config.php');
date_default_timezone_set('Asia/Manila');

// Retrieve the POST parameters
$email = $_POST['email'];
$token = $_POST['token'];
$expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expiry time (1 hour from now)

// Validate email and token (you can add more validation if needed)
if (empty($email) || empty($token)) {
    http_response_code(400); // Bad request
    echo json_encode(array("message" => "Email and token are required."));
    exit;
}

try {
    // Create a PDO connection using the database configuration
    // Prepare SQL statement to insert email, token, expiry, and usage status into the database
    $sql = "INSERT INTO password_reset (email, token, expiry, used) VALUES (:email, :token, :expiry, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':expiry', $expiry);

    // Execute the prepared statement
    $stmt->execute();

    // Return success response
    http_response_code(201); // Created
    echo json_encode(array("message" => "Token saved successfully."));

} catch (PDOException $e) {
    http_response_code(500); // Internal server error
    echo json_encode(array("message" => "Error saving token: " . $e->getMessage()));
}

// Close the database connection
$conn = null;

?>
