<?php
include('includes/header.php');
include('includes/navbar.php');
include('index_data.php');

$first_name = "";
$last_name = "";
$username = "";
$password = "";
$confirmpassword = "";
$accounttype = ""; // Assuming the account type is always "Admin" in this context.
$url ="";

if(isset($_POST["last_name"])){$first_name = $_POST["first_name"];}
if(isset($_POST["first_name"])){$last_name = $_POST["last_name"];}
if(isset($_POST["username"])){$username = $_POST["username"];}
if(isset($_POST["password"])){$password = $_POST["password"];}
if(isset($_POST["confirmpassword"])){$confirmpassword = $_POST["confirmpassword"];}

// Check if the form is submitted
if (isset($_POST["register_admin"])) {
    // Get form data
    

    $accounttype = "Admin"; 
    $url ="admin_datas.php";
}

if (isset($_POST["register_user"])) {
    // Get form data
    

    $accounttype = "User"; 

}

    if ($password === $confirmpassword) {
        // Check if the username already exists in the database
        $check_query = "SELECT COUNT(*) FROM account WHERE Username = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->execute([$username]);
        $exercise_username = $check_stmt->fetchColumn();

        if ($exercise_username) {
            // Username already exists, display an alert message
            echo '<script type="text/JavaScript">';
            echo "Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error: Username already exists in the database. Please choose a different username.',
                showConfirmButton: true,
            }).then(function() {
                window.location.href = 'admin_datas.php'; // Redirect to admin_datas.php
            });";
            echo '</script>';


        } else {
            // Username doesn't exist, proceed with insertion
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO account (Firstname, Lastname, Username, Password, AccountType)
                    VALUES (?, ?, ?, ?, ?)";
            
            // Prepare the SQL statement
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameters and execute the statement
                $stmt->bindParam(1, $first_name);
                $stmt->bindParam(2, $last_name);
                $stmt->bindParam(3, $username);
                $stmt->bindParam(4, $hashed_password);
                $stmt->bindParam(5, $accounttype);

                // Execute the statement
                if ($stmt->execute()) {
                    echo '<script type="text/JavaScript">';
                    echo "Swal.fire({
                        icon: 'success',
                        title: 'Successfully Added!',
                        showConfirmButton: true,
        
                        }).then(function() {
                            window.location.href = 'admin_datas.php'; // Redirect to admin_datas.php
                        });";
                    echo '</script>';


                } else {
                    echo '<script type="text/JavaScript">';
                    echo "Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error: Unable to add user.',
                        showConfirmButton: true,
                        timer: 1000
                        showConfirmButton: true,
        
                    }).then(function() {
                        window.location.href = 'admin_datas.php'; // Redirect to admin_datas.php
                    });";
                    echo '</script>';

                }
            } else {
                echo '<script type="text/JavaScript">';
                echo "Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error: Unable to prepare the SQL statement.',
                    showConfirmButton: true,
                    showConfirmButton: true,
        
                        }).then(function() {
                            window.location.href = 'admin_datas.php'; // Redirect to admin_datas.php
                        });";
                echo '</script>';


            }
        }
        
    }
    else 
    {
        echo"<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            ";
        echo '<script type="text/JavaScript">';
        echo "Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error: Password does not match.',
            showConfirmButton: true,
            timer: 1000
        }).then(function() {
            window.location.href = 'admin_datas.php'; // Redirect to admin_datas.php
        });";
        echo '</script>';
        echo '</script>';


    }
    if(isset($_POST["register_user"])){
        echo "<script>window.location.href = 'users_datas.php';</script>";
    }
    elseif(isset($_POST["register_admin"])){
        echo "<script>window.location.href = 'admin_datas.php';</script>";

    }

// Close the database connection
$conn = null;
?>
