<?php
// Start session if not already started
session_start();
include('config.php');


$sql = "SELECT `Password` FROM account WHERE AccountType = 'Admin'";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $validPasswordHash = $result['Password'];
    } else {
        http_response_code(400);
        echo 'Bad Request';
    }
} else {
    
}

// Check if the password sent via POST matches the valid password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $enteredPassword = $_POST['password'];

    // Compare entered password hash with valid password hash
    if (password_verify($enteredPassword, $validPasswordHash)) {
        // Password is correct
        $response = array('valid' => true);
    } else {
        // Password is incorrect
        $response = array('valid' => false);
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Invalid request method or missing password parameter
    http_response_code(400);
    echo 'Bad Request';
}
?>
