
<?php
  session_start();
  // Include your database configuration file (e.g., config.php)
  $_SESSION['currentTab'] = "Dashboard";
  include("config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login_username = $_POST["login-username"];
        $password = $_POST["login-password"];

        $stmt = $conn->prepare("SELECT * FROM account WHERE Username = :username");
        $stmt->bindParam(':username', $login_username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $rowCount = $stmt->rowCount();
        if($rowCount < 1){
            echo "Account Not Found.";
        }
        else{
            if ($user && password_verify($password, $user['Password'])) {
            if ($user['AccountType'] != 'User') {
                $_SESSION['IdNum'] = $user['IdNum'];
                $_SESSION['Username'] = $login_username;
                $_SESSION['Firstname'] = $user['Firstname'];
                $_SESSION['Lastname'] = $user['Lastname'];
                $_SESSION['Photo'] = $user['photo'];
                $_SESSION['AccountType'] = $user['AccountType'];

                echo  "Admin";
          
            } else {

                if($user['status'] === 'Pending'){
   

                    echo "Your account is not yet active. It is currently under review by the admin. Please wait for approval.";

                }
                else{
                    // $_SESSION['IdNum'] = $user['IdNum'];
                    // $_SESSION['Username'] = $login_username;
                    // $_SESSION['Firstname'] = $user['Firstname'];
                    // $_SESSION['Lastname'] = $user['Lastname'];
                    // $_SESSION['Photo'] = $user['photo'];
                    // $_SESSION['AccountType'] = $user['AccountType'];

                    // echo "User";
                    echo "Not Admin Account. Please Try Again.";
                }
                
         
            }
        }
        else {

            echo "Invalid username or password!";
    
        }
        }

        
    }
    else{
        header("Location: index.php");
    }
?>


