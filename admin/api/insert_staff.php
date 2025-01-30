<?php 

    include('config.php');
    if(isset($_POST["first_name"])){$first_name = $_POST["first_name"];}
    if(isset($_POST["last_name"])){$last_name = $_POST["last_name"];}
    if(isset($_POST["username"])){$username = $_POST["username"];}
    if(isset($_POST["password"])){$password = $_POST["password"];}
    if(isset($_POST["confirmpassword"])){$confirmpassword = $_POST["confirmpassword"];}
    $accounttype = "Staff"; 
    $id = generateUniqueId();

    function generateUniqueId() {
        // Include your database connection
        include('config.php');
        
        // Query to get the total number of accounts
        $sql = "SELECT COUNT(*) AS total FROM account WHERE AccountType = 'Staff'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalAccounts = $result['total'];
        
        // Close the database connection
        $conn = null;
        
        // Generate a unique ID based on total accounts and timestamp
        $uniqueId = 'S'. date('Ymd') . str_pad($totalAccounts + 1, 3, '0', STR_PAD_LEFT);
    
    
    
        return $uniqueId;
    }
    

    if ($password === $confirmpassword) 
    {
      // Check if the username already exists in the database
      $check_query = "SELECT COUNT(*) FROM account WHERE Username = ? AND AccountType = 'Staff'";
      $check_stmt = $conn->prepare($check_query);
      $check_stmt->execute([$username]);
      $ADMIN_username = $check_stmt->fetchColumn();

      if ($ADMIN_username) {
          // Username already exists, display an alert message
          echo 'Error: Username already exists in the database. Please choose a different username.';


      } else {
          // Username doesn't exist, proceed with insertion
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);

          $sql = "INSERT INTO account (IdNum, Firstname, Lastname, Username, Password, AccountType)
                  VALUES (?,?, ?, ?, ?, ?)";

          // Prepare the SQL statement
          $stmt = $conn->prepare($sql);

          if ($stmt) {
              // Bind parameters and execute the statement
              $stmt->bindParam(1, $id);
              $stmt->bindParam(2, $first_name);
              $stmt->bindParam(3, $last_name);
              $stmt->bindParam(4, $username);
              $stmt->bindParam(5, $hashed_password);
              $stmt->bindParam(6, $accounttype);

              // Execute the statement
              if ($stmt->execute()) {
                  echo 'Success';


              } else {
                  echo 'Error: Unable to add Staff.';

              }
          } else {
              echo 'Error: ' . $stmt->error;

          }
      }
      
  }
  else 
  {

      echo "Error: Password does not match.";



  }

?>