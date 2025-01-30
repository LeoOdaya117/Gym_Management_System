
<?php
session_start();
unset($_SESSION['Username']); // Unset or destroy the session upon logout

session_destroy();
header("Location: index.php");
?>
