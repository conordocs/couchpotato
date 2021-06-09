<?php
if (!isset($_SESSION)) {
    session_start();
}

include("connections/db.php");

$iddata = $_SESSION['user'];

$watchlistQ = "SELECT tv_shows.title, tv_watchlist.id, tv_watchlist.show_id FROM tv_shows INNER JOIN tv_watchlist ON tv_watchlist.show_id = tv_shows.id WHERE tv_watchlist.user_id = $iddata";

$watchlistR = $conn->query($watchlistQ);

$num = $watchlistR->num_rows;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Couch Potato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tv icon-->
    <link rel="shortcut icon" href="images/TV-Icon.png" />
</head>



<body>
    <header>
        <?php
        include 'nav&foot/navbar.php';
        ?>
    </header>

    <main class="container container1">
        <br>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <?php
            if (isset($_GET['login_success'])) {
                echo $_SESSION['login_success'];
            }
            if (isset($_GET['profile_edit_success'])) {
                echo $_SESSION['profile_edit_success'];
            }

            if (isset($_GET['remove_success'])) {
                echo $_SESSION['remove_success'];
            }
            if (isset($_GET['watch_success'])) {
                echo $_SESSION['watch_success'];
            }
            ?>
            <h4>My Watchlist</h4>
            <br>

            <?php

            if ($num > 0) {
                while ($row = $watchlistR->fetch_assoc()) {
                    $id = $row["id"];
                    $show_id = $row["show_id"];
                    $name = $row["title"];


                    echo "<div class='col-md-12'>
                        <div class='card mb-3'>
                            <div class='card-body'>
                            
                            
                                <div class='row'>
                                    <div class='col-sm-4'>
                                    <h3><a class='award-link' href='show.php?show_id=$show_id'>$name</a></h3>
                                    </div>
                                    <div class='col-sm-8'>
                                        <div class='btn-group'>
                                            <a href='remove_watchlist.php?fav_id=$id' class='btn btn-md btn-outline-default'>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<div class='col-md-12'>
                    <div class='card mb-3'>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <img src='images/empty.gif' alt='this slowpoke moves'  width=250/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            ?>


        </div>

    </main>

    <?php
    include 'nav&foot/footer.php';
    ?>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>

</html>