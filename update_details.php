<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
include 'connections/db.php';
// $_SESSION['user_40180801'];
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
                                    <form method='POST' action='process_details.php' enctype='multipart/form-data'>
                                        <h4>$first_name's Profile</h4>
                                        <h4><hr></h4>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <h6 class='mb-0 align-items-left text-left'><b>First Name</b></h6>
                                                </div>
                                                <div class='col-sm-8 text-secondary align-items-left text-left'>
                                                    <textarea class='form-control' width='20px' height='20px' name='first_name'>$first_name</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <h6 class='mb-0 align-items-left text-left'><b>Last Name</b></h6>
                                                </div>
                                                <div class='col-sm-8 text-secondary align-items-left text-left'>
                                                <textarea class='form-control' width='20px' height='20px' name='last_name'>$last_name</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <h6 class='mb-0 align-items-left text-left'><b>About Me</b></h6>
                                                </div>
                                                <div class='col-sm-8 text-secondary align-items-left text-left'>
                                                    <textarea class='form-control' name='about' style='height: 250px;'>$about</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <h6 class='mb-0 align-items-left text-left'><b></b></h6>
                                                </div>
                                                <div class='col-sm-8 text-secondary align-items-left text-left'>
                                                    <div class='row'>
                                                        <div class='col-6'>
                                                            <div class='btn-group'>
                                                                <button class='btn submit_btn' id='upload' type='submit'>Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </form>
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