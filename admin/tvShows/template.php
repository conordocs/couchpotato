<?php

include("../../connections/db.php");
// session start
if (!isset($_SESSION)) {
    session_start();
  }
  // if user not logged in return them to index.php
  if(!isset($_SESSION['admin'])){
    header("Location: ../index.php");
  }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tv icon-->
    <link rel="shortcut icon" href="../../images/TV-Icon.png" />
</head>



<body>
    <header>
        <?php
        include '../navbar.php';
        ?>
    </header>

    <main class="container container1">
        <br>





    </main>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>

</html>