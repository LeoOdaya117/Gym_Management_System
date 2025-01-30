<?php
include('config.php');


// Check if the form is submitted
if (isset($_POST["register_admin"])) {
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $accounttype = "Admin"; // Assuming the account type is always "Admin" in this context

    if ($password === $confirmpassword) {
        // Check if the username already exists in the database
        $check_query = "SELECT COUNT(*) FROM account WHERE Username = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->execute([$username]);
        $username_exists = $check_stmt->fetchColumn();

        if ($username_exists) {
            // Username already exists, show an error message
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error: Username already exists in the database. Please choose a different username.',
                    showConfirmButton: true
                }).then(function() {
                    window.location.href = 'admin_datas.php';
                });
            </script>";
        } else {
            // Username doesn't exist, proceed with insertion
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO account (Name, Username, Password, AccountType)
                    VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt && $stmt->execute([$full_name, $username, $hashed_password, $accounttype])) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Added!',
                        showConfirmButton: true
                    }).then(function() {
                        window.location.href = 'admin_datas.php';
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error: Unable to add user.',
                        showConfirmButton: true
                    }).then(function() {
                        window.location.href = 'admin_datas.php';
                    });
                </script>";
            }
        }
    } else {
        // Passwords do not match, show an error message
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error: Password does not match.',
                showConfirmButton: true
            }).then(function() {
                window.location.href = 'admin_datas.php';
            });
        </script>";
    }
}

// Close the database connection
$conn = null;
?>
