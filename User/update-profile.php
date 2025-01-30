<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username from the POST data
    $userId = $_POST['myprofile-username'];

    // Check if file upload is successful
    if ($_FILES['myprofile-photo']['error'] === UPLOAD_ERR_OK) {
        // Get the name of the uploaded file
        $photoFileName = $_FILES['myprofile-photo']['name'];
        // Define the upload directory
        $uploadDirectory = '../img/uploads/' . $photoFileName;

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($_FILES['myprofile-photo']['tmp_name'], $uploadDirectory)) {
            // File upload successful, update the photo column in the database
            $imagePath = 'img/uploads/' . $photoFileName;

            // Update the photo column in the account table
            $sql = "UPDATE account SET `photo`='$imagePath' WHERE Username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $userId); // Bind the username parameter
            if ($stmt->execute()) {
                // Update successful
                $_SESSION["Photo"] = $imagePath; // Update the session variable for the user's photo
                $responseMessage = "Photo updated successfully.";
                echo $responseMessage;
            } else {
                // Update failed
                $responseMessage = "Failed to update photo.";
                echo $responseMessage;
            }
        } else {
            // Error handling for image upload
            $responseMessage = "Error uploading photo.";
            echo $responseMessage;
        }
    } else {
        // Handle errors related to image upload
        $responseMessage = "Invalid file upload.";
        echo $responseMessage;
    }
} else {
    // Invalid request method
    echo "Invalid request";
}
?>
