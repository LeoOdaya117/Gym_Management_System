<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}

include("include_user/header.php");
include("include_user/nabvar.php");
include("config.php");


$idnum = $_SESSION['IdNum'];
$photo = $_SESSION['Photo'];
$full_name = $_SESSION['Firstname'] ." ". $_SESSION['Lastname'];
$query = "SELECT * FROM membership WHERE membershipid = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $idnum); // Using the placeholder index 1 for the first parameter

$stmt->execute();
$membership = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrinosGym</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
/* CSS to style the qrCodeContainer */
#qrCodeContainer {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999; /* Ensure it's above other content */
    background-color: white; /* Set background color */
    border: 2px solid black; /* Add border for visual distinction */
    padding: 20px; /* Increase padding */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add box shadow for depth */
    width: 80%; /* Set the width of the container */
    max-height: 80%; /* Limit the maximum height of the container */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
}

#qrcodeimage {
    width: 100%; /* Ensure the image fills its container */
    height: auto; /* Auto-adjust height to maintain aspect ratio */
    max-width: 100%; /* Ensure the image fits within its container */
    max-height: 100%; /* Ensure the image fits within its container */
}

/* Media query for smaller screens */
@media screen and (max-width: 768px) {
    #qrCodeContainer {
        width: 90%; /* Adjust width for smaller screens */
        padding: 10px; /* Adjust padding for smaller screens */
    }
   
}
@media screen and (min-width: 1200px) {
    #qrCodeContainer {
        max-width: 400px; /* Limit the maximum width of the container */
    }
}



    

    </style>
</head>
<body>
<main id="main" class="main">

    <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a>Profile</a></li>

        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
  
      <div class="row">
          <div class="contaner-fluid">

          

      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img id="Userpic" src="img/loading.jpg" alt="Profile" class="rounded-circle">
              <h2 id="fullname">Loading...</h2>
              <h3 id="position">Loading...</h3>
              <div class="social-links mt-2">
                <a id="qrCodeIcon" href="#" class="twitter" title="QR Code" onclick="showQRCode()"><i class="fa-solid fa-qrcode"></i></a>
              </div>
              <div id="qrCodeContainer" style="display: none;">
                <img id="qrcodeimage" src="img/loading.jpg" alt="QR Code" onclick="hideqr()">
              </div>
            </div>
          </div>

        </div>

        
      </div>

      

          </div>
      </div>



              
    </section>


</div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="assets/js/navbar.js"></script>
<script src="assets/js/user_profile.js"></script>

</body>
</html>
 
<?php 
include("include_user/footer.php");
?>

