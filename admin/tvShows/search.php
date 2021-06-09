<?php

include("../../connections/db.php");

$search_query = $_GET['search'];

$tvshowquery = "SELECT * FROM tv_shows WHERE title LIKE '%$search_query%'";

$tvshowresult = $conn->query($tvshowquery);
$count = mysqli_num_rows($tvshowresult);

if (!$tvshowresult) {

    echo $conn->error;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Couch Potato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tv icon-->
    <link rel="shortcut icon" href="images/TV-Icon.png" />
</head>



<body>
    <header>
        <?php
        include '../navbar.php';
        ?>
    </header>

    <main class="container container1">
        <br>
        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <h1 class="display-4">Product Search</h1>
            <h3 class="display-5">Your search for <i>'<?= $search_query; ?>'</i> returned <i>'<?= $count; ?>'</i> shows</h3>
        </div>
        <div class='row'>
            <?php

            // using while loop to fetch 'featured shows'
            while ($row = $tvshowresult->fetch_assoc()) {
                $id = $row["id"];
                $title = $row["title"];

                // displaying them in cards to made it look professional along with a 'Hot Item' ribbon
                echo "<div class='col-md-4'>
                        <div class='card mb-4 box-shadow'>
                            <a href ='show.php?show_id=$id'><img class='card-img-top' style='background : #fff;' src='../../images/couchpotato.png' height='250' alt='img'></a>
                            <div class='card-body'>
                                <h5><b>$title</b></h5>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <div class='btn-group'>
                                        <a href='show.php?show_id=$id' class='btn btn-sm btn-outline-default'>View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
        <br><br>



    </main>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>

</html>