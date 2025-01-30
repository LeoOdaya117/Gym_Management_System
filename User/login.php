<?php
// Start the session before any output
session_start();

// Include your database configuration file (e.g., config.php)
include("config.php");

// Set session variable for the current tab
$_SESSION['currentTab'] = "Dashboard";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process POST request for login
    if (isset($_POST["login-username"]) && isset($_POST["login-password"])) {
        $login_username = $_POST["login-username"];
        $password = $_POST["login-password"];

        $stmt = $conn->prepare("SELECT * FROM account WHERE Username = :username");
        $stmt->bindParam(':username', $login_username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $rowCount = $stmt->rowCount();

        if ($rowCount < 1) {
            echo "Account Not Found.";
        } else {
            if ($user && password_verify($password, $user['Password'])) {
                if ($user['AccountType'] === 'Admin') {
                    echo "Admin is not Allowed in Android.";
                } else {
                    if ($user['status'] === 'Pending') {
                        echo "Your account is not yet active.";
                    } else {
                        // Set session variables for authenticated user
                        $_SESSION['IdNum'] = $user['IdNum'];
                        $_SESSION['Username'] = $login_username;
                        $_SESSION['Firstname'] = $user['Firstname'];
                        $_SESSION['Lastname'] = $user['Lastname'];
                        $_SESSION['Photo'] = $user['photo'];
                        $_SESSION['AccountType'] = $user['AccountType'];
                        echo "User";
                    }
                }
            } else {
                echo "Invalid username or password!";
            }
        }
    }
} else {
    // Handle other requests (e.g., GET)
    // Redirect to an appropriate location or display an error message
    echo "Invalid request method.";
}
?>
