<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
include("connections/db.php");

$iddata = $_SESSION['user'];

$query = "SELECT * FROM tv_users WHERE id = $iddata";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Couch Potato - Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header>
        <?php
        include 'nav&foot/navbar.php';
        ?>

    </header>

    <main class="container container1">

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <?php
            if (isset($_GET['login_success'])) {
                echo $_SESSION['login_success'];
            }
            if (isset($_GET['profile_edit_success'])) {
                echo $_SESSION['profile_edit_success'];
            }

            ?>
            <?php

            while ($row = $result->fetch_assoc()) {
                $username = $row["username"];
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $about = $row["about"];

                echo "<div class='container'>
                <div class='main-body'>
                    <div class='row gutters-sm'>
                        <div class='col-md-4 mb-3'>
                            <div class='card'>
                                <div class='card-body'>
                                    <div class='d-flex flex-column align-items-center text-center'>
                                        <div class='mt-3'>
                                        <img class='card-img-top' style='background: #fff;' src='images/couchpotato.png' height='250' alt='img'>
                                            <h4>$first_name $last_name</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <div class='card mb-3'>
                                <div class='card-body'>
                                <h4>$first_name's Profile</h4>
                                <h4><hr></h4>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b>Full Name</b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-left text-left'>
                                            $first_name $last_name
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b>About Me</b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-left text-left'>
                                            $about
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b></b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-center text-center'>
                                            <div class='row'>
                                                <div class='col-6'>
                                                    <div class='btn-group'>
                                                        <a href='watchlist.php' class='btn btn-md btn-outline-default'>Watchlist</a>
                                                    </div>
                                                </div>
                                                <div class='col-6'>
                                                    <div class='btn-group'>
                                                        <a href='update_details.php' class='btn btn-md btn-outline-default'>Edit Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
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