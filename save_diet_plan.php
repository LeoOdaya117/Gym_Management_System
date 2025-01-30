<?php
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
}

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dietPlan'])) {
  // Get the user's ID (You might have a different way to retrieve the user ID)
  $userId = $_SESSION['Username'];

  // Get the diet plan data from the POST request
  $dietPlan = $_POST['dietPlan'];

  // Database connection parameters

  // Perform the database operation to save the diet plan
  $sql = "INSERT INTO diet_plans (user_id, diet_plan) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("ss", $userId, $dietPlan);

    if ($stmt->execute()) {
      // Diet plan saved successfully
      echo "Diet plan saved successfully.";
    } else {
      // Error handling
      echo "Error saving the diet plan.";
    }
  }

  $conn->close();
} else {
  echo "Invalid request.";
}
?>
