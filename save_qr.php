<?php
// Check if the imageData and inputData are set in the POST request
if(isset($_POST['imageData']) && isset($_POST['inputData'])) {
    // Get the base64 image data
    $imageData = $_POST['imageData'];
    // Get the input data
    $inputData = $_POST['inputData'];

    // Remove the "data:image/png;base64," prefix to get the raw base64 data
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    $imageData = str_replace(' ', '+', $imageData);

    // Decode the base64 data
    $decodedImage = base64_decode($imageData);

    // Define the file name based on the input data
    $fileName = $inputData . '.png'; // You can adjust the file extension if needed

    // Specify the directory where the image will be saved
    $filePath = 'img/' . $fileName; // Adjust the directory path as per your project structure

    // Save the image to the specified directory
    if(file_put_contents($filePath, $decodedImage)) {
        echo 'Image saved successfully.';
    } else {
        echo 'Error saving image.';
    }
} else {
    echo 'Error: Image data not received.';
}
?>
