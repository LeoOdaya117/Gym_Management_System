<?php
session_start();

 // Unset or destroy the session upon logout
if(isset($_SESSION['Username'])){
    header("Location: admin-index.php");
}
else{
    unset($_SESSION['Username']);
    session_destroy();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BeFit: Your Journey to Wellness</title>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="css/Home.css">
    
    <!-- Font Awesome Iocns cdn link -->
    

    
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

   
    
    
</head>
<body>
    <header class="header fade-in">

        <a href="#Home" class="logo" onclick="reloadPage()">
            <!-- <i class="fas fa-dumbbell"></i>BeFit -->
            <img src="img/logo.png" alt="logo" width="40" height="40"> Trinos
            
        </a>

        <div class="menu-toggle-container">
            <i class="fas fa-bars" id="menu-icon"></i>
            <i class="fas fa-times" id="close-icon" style="display: none;"></i>
          </div>
          

        <nav class="navbar">
            <a href="#Home" onclick="toggleNav()">Home</a>
            <a href="#about" onclick="toggleNav()">About Us</a>
            <a href="#service" onclick="toggleNav()">Services</a>
            <a href="#footer" onclick="toggleNav()">Contact</a>
            <a href="#" class="Line">|</a>
            <a href="#Login" id="login-link" onclick="toggleNav()">Login</a>
            
        </nav>

        
          

    </header>

    <!-- Login Modal -->
    <div class="modal" id="login-modal" style="display: none;">
        <div class="modal-content">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                        <span class="close" id="close-modal">&times;</span> <!-- Close button here -->
                    </div>
                    <div class="card-body">
                        <form method="POST" id="login-form" action="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="login-username" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="login-password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-login" name="loginbtn">Login</button>
                            <p class="signup-text">Don't have an account? <a href="#" id="signup-link2">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Signup Modal -->
    <div class="modal" id="signup-modal" style="display: none;">
        <div class="modal-content">
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Sign Up</h3>
                        <span class="close" id="close-signup-modal">&times;</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <!-- Signup form fields -->
                            <div class="form-group">
                                <label for="signup-FirstName">First Name</label>
                                <input type="text" class="form-control" id="signup-FirstName" name="signup-FirstName" placeholder="Enter Full Name" required>
                            </div>
                            <div class="form-group">
                                <label for="signup-LastName">Last Name</label>
                                <input type="text" class="form-control" id="signup-LastName" name="signup-LastName" placeholder="Enter Full Name" required>
                            </div>
                            <div class="form-group">
                                <label for="signup-username">Username</label>
                                <input type="text" class="form-control" id="signup-username" name="signup-username" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="signup-password">Password</label>
                                <input type="password" class="form-control" id="signup-password" name="signup-password" placeholder="Enter password" required>
                            </div>
                            <!-- Add more signup fields as needed -->
                            <button type="submit" class="btn btn-primary btn-login" name="signupBtn">Sign Up</button>
                            <p class="signup-text">Already have an account? <a href="#" id="login-link2">Log in</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Signup Modal PHP -->
    <?php
        include("config.php");
        include('phpqrcode/qrlib.php');

        function generateUniqueId() {
            // Include your database connection
            include('config.php');
            
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


        if (isset($_POST['signupBtn'])) {

            $uniqueId = generateUniqueId();

            $outputFile = "img/". $uniqueId .".png";

            // Generate the QR code
            QRcode::png($uniqueId, $outputFile);

            $Firstname = $_POST["signup-FirstName"];
            $Lastname = $_POST["signup-LastName"];
            $username = $_POST["signup-username"];
            $password = password_hash($_POST["signup-password"], PASSWORD_BCRYPT);
            $accountype = "User";
            $status = 'Pending';
            // Check if the username already exists
            $stmt_check = $conn->prepare("SELECT Username FROM account WHERE Username = :username");
            $stmt_check->bindParam(':username', $username);
            $stmt_check->execute();

            if ($stmt_check->rowCount() > 0) {
                echo "<script type='text/JavaScript'>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'Username is already taken. Please choose a different username.',
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'Home.php?showModal=signup';
                        }
                    });
                </script>";
            } else {
                // Insert the data into the database
                $stmt_insert = $conn->prepare("INSERT INTO account (IdNum,Firstname, Lastname, Username, Password, AccountType, `status`, qr) VALUES (:IdNum,:Firstname, :Lastname, :username, :password, :AccountType, :status, :qr)");
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
                        echo "<script type='text/JavaScript'>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Registration successful!',
                                showConfirmButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'Home.php?showModal=login';
                                }
                            });
                        </script>";
                    } else {
                        echo "<script type='text/JavaScript'>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error: Registration failed.',
                                showConfirmButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'Home.php?showModal=signup';
                                }
                            });
                        </script>";
                    }
                } catch (PDOException $e) {
                    $erromes = $e->getMessage();
                    echo "<script type='text/JavaScript'>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error: " . $erromes . "',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location href = 'Home.php';
                            }
                        });
                    </script>";
                }
            }
        }
    ?>




    <!-- Home section -->

    <section id="Home" class="home">
        <div class="max-width">
            <div class="home-content">
                <h3 id="typing-text" class="typing-text">BeFit: Your Journey to Wellness<span class="blinking-cursor"></span></h3>
                <p>Welcome to BeFit, your go-to resource for a healthier you. Discover free workout routines, exercise guidance, and diet tips to support your journey to a fitter and more vibrant lifestyle.</p>
                <button class="btn" ><a href="#SignUp" id="signup-link">Sign Up</a></button>
            </div>
            <div class="home-image">
                <br>
                <img src="img/HomePic.jpg" alt="">
            </div>
        </div>
    </section>

   <!-- ABOUT section -->
    
    <!-- ABOUT section -->
    <section id="about">
        
        <div class="about-content">
            
            <h2>ABOUT US</h2>
            
            <p class="about-paragraph">At BeFit, we're dedicated to helping you 'Be Fit' and 'Be Healthy.' Our platform provides a wide range of free online workouts and exercise routines suitable for all fitness levels. We also offer nutritional recommendations to support your journey to better health. Whether you're a beginner or a fitness enthusiast, BeFit is your partner in achieving a happier and healthier lifestyle. Join us today!</p>
            <div class="about-images">
                <div class="about-image">
                    <img src="img/aboutUsPicture.jpg" alt="Men with Dumbbell" class="image-about1">
                </div>
                <div class="about-image">
                    <img src="img/aboutUsPicture2.jpg" alt="Men with Dumbbell" class="image-about1">
                </div>
            </div>
        </div>
    </section>
    

    <!-- SERVICE section -->

    
    <section id="service">
        
        <div class="contact-content">
            <div class="title">
                <h2>OUR SERVICES</h2>
            </div>
            <div class="services-content">
                <div class="services">
                    <div class="icons">
                        <i class="fa-solid fa-dumbbell"></i>
                    </div>
                    <h2>Exercise Guides</h2>
                    <p>
                        Our commitment to accessibility means that you can embark on your path to a healthier lifestyle without worrying about financial barriers. These resources are available to you at absolutely no cost.
                    </p>
                </div>
                <div class="services">
                    <div class="icons">
                        <i class="fa-brands fa-nutritionix"></i>
                    </div>
                    <h2>Proper Diet</h2>
                    <p>
                        Uncover the secrets to long-lasting health and vitality through our Proper Diet service, a comprehensive program designed to revolutionize the way you think about food and nutrition.
                    </p>
                </div>
                <div class="services">
                    <div class="icons">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
                    <h2>Nutritional Tools</h2>
                    <p>
                        Experience the ease and empowerment of taking control of your nutrition, one calorie at a time, with our cutting-edge nutritional tools. Your journey to a healthier, more vibrant life starts here.
                    </p>
                </div>
            </div>
        </div>

    </section>


  

    <footer id="footer">
        <div class="footer-content">
          <div class="footer-section contact">
            <h2>Contact Us</h2>
            <p>Email: support.BeFit@gmail.com</p>
            <p>Phone: +1 (123) 456-7890</p>
          </div>
          <div class="footer-section links">
            <h2>Quick Links</h2>
            <ul>
              <li><a href="#Home">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#service">Services</a></li>
              <li><a href="#footer">Contact</a></li>
            </ul>
          </div>
          <div class="footer-section social">
            <h2>Follow Us</h2>
            <ul>
                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i>Facebook</a></li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i>Twitter</a></li>
                <li><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i>Linkedin</a></li>
                <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i>Instagram</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          &copy; 2023 BeFit Offical. All rights reserved.
        </div>
    </footer>
      
      
    <script>
        // JavaScript function to toggle the navigation bar and icons
        function toggleNav() {
            var navbar = document.querySelector(".navbar");
            var menuIcon = document.querySelector("#menu-icon");
            var closeIcon = document.querySelector("#close-icon");
    
            // Toggle the visibility of the icons
            menuIcon.style.display = menuIcon.style.display === "none" ? "inline-block" : "none";
            closeIcon.style.display = closeIcon.style.display === "none" ? "inline-block" : "none";
    
            // Toggle the "show-nav" class for the navigation
            navbar.classList.toggle("show-nav");
        }
    
        // Attach the toggleNav function to your menu toggle button's click event
        document.querySelector(".menu-toggle-container").addEventListener("click", toggleNav);
    
        // JavaScript function to open the login modal
        function openLoginModal() {
            document.getElementById("login-modal").style.display = "flex"; // Show the modal
            closeSignupModal(); // Close the signup modal when opening login modal
        }
    
        // JavaScript function to close the login modal
        function closeLoginModal() {
            document.getElementById("login-modal").style.display = "none"; // Hide the modal
        }
    
        // Attach the openLoginModal function to your "Login" link's click event
        document.getElementById("login-link").addEventListener("click", openLoginModal);
        document.getElementById("login-link2").addEventListener("click", openLoginModal);
    
        // Attach the closeLoginModal function to the "Close" button's click event
        document.getElementById("close-modal").addEventListener("click", closeLoginModal);
    
        // JavaScript function to open the signup modal
        function openSignupModal() {
            document.getElementById("signup-modal").style.display = "flex"; // Show the modal
            closeLoginModal(); // Close the login modal when opening signup modal
        }
    
        // JavaScript function to close the signup modal
        function closeSignupModal() {
            document.getElementById("signup-modal").style.display = "none"; // Hide the modal
        }
    
        // Attach the openSignupModal function to your "Sign Up" link's click event
        document.getElementById("signup-link").addEventListener("click", openSignupModal);
        // Attach the openSignupModal function to your "Sign Up" link's click event
        document.getElementById("signup-link2").addEventListener("click", openSignupModal);
    
        // Attach the closeSignupModal function to the "Close" button's click event
        document.getElementById("close-signup-modal").addEventListener("click", closeSignupModal);


        // Check if the showModal parameter exists in the URL
// Check if the showModal parameter exists in the URL
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('showModal')) {
            var modalToShow = urlParams.get('showModal');
            if (modalToShow === 'login') {
                // Open the login modal if the parameter is 'login'
                openLoginModal();
            } else if (modalToShow === 'signup') {
                // Open the signup modal if the parameter is 'signup'
                openSignupModal();
            }
        }
       
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script  src="javascript/Home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="javascript/user-index.js"></script>

    
      
      
</body>
</html>