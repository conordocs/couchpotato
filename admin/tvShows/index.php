<?php

include("../../connections/db.php");
// session start
// if (!isset($_SESSION)) {
    session_start();
// }
// if user not logged in return them to index.php
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Couch Potato - Admin</title>
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

        <div class="container">
            <br>
            <?php
            if(isset($_GET['add_success'])){
                echo $_SESSION['add_success'];
            }
            if(isset($_GET['delete_success'])){
                echo $_SESSION['delete_success'];
            }
            if(isset($_GET['edit_success'])){
                echo $_SESSION['edit_success'];
            }
            
            ?>
            <h2>TV Shows Home</h2>
            <br>
            <div class='btn-group'>
                <a href='add.php' class='btn btn-lg btn-outline-default'>Add TV Show</a>
            </div>

            <br>
            <br>
            <br>

            <h4>
                <p>Search for TV Show to 'Edit' or 'Delete':</p>
            </h4>
            <form class="d-flex" action="search.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-md btn-outline-default" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <br><br>
        </div>
        <!-- <h2>Tv Shows Edit</h2> -->






    </main>

    <?php
    // include '../../nav&foot/footer.php';
    ?>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>

</html>