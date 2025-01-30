<?php
session_start();

if (!isset($_SESSION['Username'])) {
    header("Location: home.php");
    exit();
}

if (isset($_GET['tab'])) {
    $_SESSION['currentTab'] = $_GET['tab'];
}

include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'myprofile-photo' key is set in the $_FILES array
    $username = $_POST['myprofile-username'];
    $Fname = $_POST['myprofile-Fname'];
    $Lname = $_POST['myprofile-Lname'];
    $Age = $_POST['myprofile-Age'];
    $Gender = $_POST['myprofile-Gender'];
    $imagePath = "";

    $userId = $_SESSION["Username"];

    if (isset($_FILES['myprofile-photo'])) {
        

        // Check if photo file is uploaded
        if ($_FILES['myprofile-photo']['error'] === UPLOAD_ERR_OK) {
            $photoFileName = $_FILES['myprofile-photo']['name'];
            $uploadDirectory = 'img/uploads/' . $photoFileName;

            if (move_uploaded_file($_FILES['myprofile-photo']['tmp_name'], $uploadDirectory)) {
                $imagePath = 'img/uploads/' . $photoFileName;
            } else {
                echo "Error moving uploaded file";
                exit(); // Stop further execution
            }
        }

        // Update user profile information in the database
        $sql = "UPDATE account SET `Firstname`=?, `Lastname`=?, `Username`=?, `Age`=?, `Gender`=?, `photo`=? WHERE `Username`=?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->execute([$Fname, $Lname, $username, $Age, $Gender, $imagePath, $userId]);
            $_SESSION["Photo"] = $imagePath;
            $_SESSION["Firstname"] = $Fname;
            $_SESSION["Lastname"] = $Lname;
            echo "Success";
        } else {
            echo "Error preparing SQL statement";
        }
    } else {
        // Update user profile information in the database
        $sql = "UPDATE account SET `Firstname`=?, `Lastname`=?, `Username`=?, `Age`=?, `Gender`=? WHERE `Username`=?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->execute([$Fname, $Lname, $username, $Age, $Gender, $userId]);
            $_SESSION["Firstname"] = $Fname;
            $_SESSION["Lastname"] = $Lname;
            echo "Success";
        } else {
            echo "Error preparing SQL statement";
        }
    }
} else {
    echo "Invalid request";
}
?>
