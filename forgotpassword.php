<?php
session_start();

include('config.php');

// If email is not set in the URL parameters, redirect to error page
if (!isset($_GET['email'])) {
    header("Location: pages-error-404.php");
    exit();
}

// Store email from URL parameter in session for verification
$email = $_GET['email'];
$token = $_GET['token'];
// Verify if the provided token is valid
if (isset($token)) {
   
    
    // Query to check if token is valid and not expired
    $query = "SELECT * FROM `password_reset` WHERE email = :email AND token = :token AND used = 0 AND expiry > NOW()";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        // Token is valid, proceed with password reset
        // Mark the token as used to prevent further use
        // $updateQuery = "UPDATE password_reset SET used = 1 WHERE email = :email AND token = :token";
        // $updateStmt = $conn->prepare($updateQuery);
        // $updateStmt->bindParam(':email', $email);
        // $updateStmt->bindParam(':token', $token);
        // $updateStmt->execute();
    } else {
        // Token is invalid or expired, handle accordingly (e.g., redirect to error page)
        header("Location: pages-error-404.php");
        // echo "Not found!";
        // echo "Query: " . $query . PHP_EOL;
        // echo "Email: " . $email . PHP_EOL;
        // echo "Token: " . $token . PHP_EOL;

        exit();
    }
} else {
    // Token not provided in URL, handle accordingly (e.g., redirect to error page)
    // echo "No token found";
    header("Location: pages-error-404.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <link href="img/systemlogobox.png" rel="icon">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh; /* Ensure the body takes up the full viewport height */
            margin: 0; /* Remove default margin */
        }

        .container {
        }

        .success {
            align-items: center;
            text-align: center;
            display: none;
        }

        .success h1 {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container" id="formContainer">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="forgotpassword.html" class="logo d-flex align-items-center w-auto">
                                <img src="img/systemlogobox.png" alt="Gym Logo" width="100" height="100">
                                <!-- <span class="d-none d-lg-block">TrinosGym</span> -->
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Change password</h5>
                                    <p class="text-center small">Protect your account with a unique password at least 6 characters long.</p>
                                </div>
                                <form class="row g-3 needs-validation" id="forgotpassword-form" method="post" action="update_password.php">
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="edit_password" class="form-control" id="Password" placeholder="New password (6-60 characters)" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="edit_confirm_password" class="form-control" id="confirmPassword" placeholder="Re-enter new password" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <div class="col-12 mb-4">
                                        <button class="btn btn-primary w-100" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="javascript/forgotpassword.js"></script>
</body>

</html>
