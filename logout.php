<?php
// destroying session to log out and return to index.php
session_start();
unset($_SESSION['user']);
session_destroy();
header("Location: index.php");
exit;
?>