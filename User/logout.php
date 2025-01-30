
<?php
session_start();
unset($_SESSION['Username']); // Unset or destroy the session upon logout

session_destroy();


// header("Location: pages-login.html");
header("Refresh: 2; URL = pages-login.html");

?>
