<?php

include("connections/db.php");

$featuredQ = "SELECT * FROM tv_shows WHERE featured=1";

$featuredR = $conn->query($featuredQ);

if (!$featuredR) {
    echo $conn->error;
}

$topQ = "SELECT * FROM tv_shows WHERE top_rated=1";

$topR = $conn->query($topQ);

if (!$topR) {
    echo $conn->error;
}

$exploreQ = "SELECT * FROM tv_shows WHERE explore_whats_streaming=1";

$exploreR = $conn->query($exploreQ);

if (!$exploreR) {
    echo $conn->error;
}

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
    <!-- welcome -->
    <center>
        <div class=" inner-body ">
            <h1 class="title ">Welcome!</h1>
            <p style="color: black" class="content">
                Welcome to
                <span style="font-weight:bold; color: #32989a">Couch Potato</span>. It is site where you can view and review your favourite TV Shows. <span style="font-weight:bold; color: #32989a">Couch Potato</span>
                are best known for the excellent information they provide on each and every TV Show on
                <span style="font-weight:bold; color: #32989a">Netflix, Hulu, Prime Video and Disney+</span>. By joining, not only will you find Fan Favourites, Top Rated and Explore what's streaming but more importantly you will have access to the IMDb and Rotten Tomatoes scores for every TV Show. Choosing what to watch from the comfort of your own <span style="font-weight:bold; color: #32989a">Couch</span> has never been easier...
            </p>
        </div>
    </center>
    
    <!-- welcome ended -->

        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">


            <!--            -->
            <!-- Featured  -->
            <!--            -->
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-6">Featured TV Shows</h1>
            </div>
            <div class='row'>
                <?php

                // using while loop to fetch 'featured shows'
                while ($row = $featuredR->fetch_assoc()) {
                    $id = $row["id"];
                    $title = $row["title"];

                    // displaying them in cards to made it look professional along with a ribbon
                    echo "<div class='col-md-3' style='background: #fff !important;'>
                        <div class='card mb-3 box-shadow' style='background: #fff;'>
                            <div class='ribbon-corner'><b><p>Featured!</p></b>
                                <a href ='show.php?show_id=$id'><img class='card-img-top' style='background: #fff;' src='images/couchpotato.png' height='250' alt='img'></a>
                                <div class='card-body'>
                                    <h5><b>$title</b></h5>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <a href='show.php?show_id=$id' class='btn btn-sm btn-outline-default'>View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>

            <!--            -->
            <!-- Top Rated  -->
            <!--            -->
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-6">Top Rated TV Shows</h1>
            </div>
            <div class='row'>
                <?php

                // using while loop to fetch 'top rated shows'
                while ($row = $topR->fetch_assoc()) {
                    $id = $row["id"];
                    $title = $row["title"];

                    // displaying them in cards to made it look professional along with a ribbon
                    echo "<div class='col-md-3' style='background: #fff !important;'>
                        <div class='card mb-3 box-shadow' style='background: #fff;'>
                            <div class='ribbon-corner'><b><p>Top Rated!</p></b>
                                <a href ='show.php?show_id=$id'><img class='card-img-top' style='background: #fff;' src='images/couchpotato.png' height='250' alt='img'></a>
                                <div class='card-body'>
                                    <h5><b>$title</b></h5>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <a href='show.php?show_id=$id' class='btn btn-sm btn-outline-default'>View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>

            <!--          -->
            <!-- Explore  -->
            <!--          -->
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-6">Explore What's Streaming!</h1>
            </div>
            <div class='row'>
                <?php

                // using while loop to fetch 'explore whats streaming shows'
                while ($row = $exploreR->fetch_assoc()) {
                    $id = $row["id"];
                    $title = $row["title"];

                    // displaying them in cards to made it look professional along with a ribbon
                    echo "<div class='col-md-3' style='background: #fff !important;'>
                        <div class='card mb-3 box-shadow' style='background: #fff;'>
                            <div class='ribbon-corner'><b><p>Explore!</p></b>
                                <a href ='show.php?show_id=$id'><img class='card-img-top' style='background: #fff;' src='images/couchpotato.png' height='250' alt='img'></a>
                                <div class='card-body'>
                                    <h5><b>$title</b></h5>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <a href='show.php?show_id=$id' class='btn btn-sm btn-outline-default'>View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
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