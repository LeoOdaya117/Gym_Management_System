


<?php
include("config.php");
include("function.php");
include('../phpqrcode/qrlib.php');

function generateUniqueId() {
    // Include your database connection
    include('../config.php');
    
    // Query to get the total number of accounts
    $sql = "SELECT COUNT(*) AS total FROM account";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalAccounts = $result['total'];
    
    // Close the database connection
    $conn = null;
    
    // Generate a unique ID based on total accounts and timestamp
    $uniqueId = date('Ymd') . str_pad($totalAccounts + 1, 3, '0', STR_PAD_LEFT);



    return $uniqueId;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    

    // Example usage:
    $uniqueId = generateUniqueId();
    // Retrieve and sanitize input data
    $Firstname = htmlspecialchars($_POST["signup-FirstName"]);
    $Lastname = htmlspecialchars($_POST["signup-LastName"]);
    $username = htmlspecialchars($_POST["signup-username"]);
    $password = password_hash($_POST["signup-password"], PASSWORD_BCRYPT);
    $accountype = "User";
    $status = 'Pending';

    // Data to encode in the QR code
    // $data = "36";

    // Output file path
    $outputFile = "../img/qr/". $uniqueId .".png";

    // Generate the QR code
    QRcode::png($uniqueId, $outputFile);

    // Output the QR code image
    //echo '<img src="' . $outputFile . '" alt="QR Code">';

    // Check if the username already exists
    $stmt_check = $conn->prepare("SELECT Username FROM account WHERE Username = :username");
    $stmt_check->bindParam(':username', $username);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        echo "Username is already taken.";
    } else {
        // Insert the data into the database
        $stmt_insert = $conn->prepare("INSERT INTO account (IdNum, Firstname, Lastname, Username, Password, AccountType, `status`, qr, `registrationdate`) VALUES (:IdNum, :Firstname, :Lastname, :username, :password, :AccountType, :status, :qr, NOW())");
        $stmt_insert->bindParam(':IdNum', $uniqueId);
        $stmt_insert->bindParam(':Firstname', $Firstname);
        $stmt_insert->bindParam(':Lastname', $Lastname);
        $stmt_insert->bindParam(':username', $username);
        $stmt_insert->bindParam(':password', $password);
        $stmt_insert->bindParam(':AccountType', $accountype);
        $stmt_insert->bindParam(':status', $status);
        $stmt_insert->bindParam(':qr', $outputFile);


        try {
            if ($stmt_insert->execute()) {
                // Registration successful
                echo "Success";

                    //Insert to notifcation table
                $adminID = getAdminID();
                $messageCategory = "Account Registration";
                $messageContent = "A new user has registered.";
                $status = "Unread";
                $noticationSQL = "INSERT INTO `notifications` (`IdNum`, `messageCategory`, `messageContent`, `status`, `notifDate`) VALUES (?,?, ?, ?, NOW())";
                $notifcationStmt = $conn->prepare($noticationSQL);
                $notifcationStmt->bindParam(1, $adminID);
                $notifcationStmt->bindParam(2, $messageCategory);
                $notifcationStmt->bindParam(3, $messageContent);
                $notifcationStmt->bindParam(4, $status);
                $notifcationStmt->execute();
            } else {
                echo "Registration failed. Please try again later.";
            }
        } catch (PDOException $e) {
            error_log("Error during registration: " . $e->getMessage());
            echo "An error occurred during registration. Please try again later.";
        }
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
