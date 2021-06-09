<?php

include("../../connections/db.php");
// session start
if (!isset($_SESSION)) {
    session_start();
}
// if user not logged in return them to index.php
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
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
    <link rel="shortcut icon" href="../../images/TV-Icon.png" />
</head>



<body>
    <header>
        <?php
        include '../navbar.php';
        ?>
    </header>

    <main class="container container1">
        <div class="container">
            <br>

            <!-- <h2>Tv Shows Edit</h2> -->
            <h2>Add TV Show</h2>
            <form method='POST' action='addTV.php' enctype='multipart/form-data'>
                <!-- title -->
                <div class="mb-3">
                    <label for="title" class="form-label">TV Show Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <!-- year -->
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" class="form-control" id="year" name="year">
                    <div id="year" class="form-text">Insert TV Show Release Year e.g. 2020</div>
                </div>
                <!-- age -->
                <div class="mb-3">
                    <label for="age" class="form-label">Age Rating</label>
                    <input type="text" class="form-control" id="age" name="age">
                    <div id="age" class="form-text">Insert Age Rating e.g PG</div>
                </div>
                <!-- imdb -->
                <div class="mb-3">
                    <label for="imdb" class="form-label">IMDB Score</label>
                    <input type="double" class="form-control" id="imdb" name="imdb">
                    <div id="imdb" class="form-text">Insert IMDB Score e.g. 7.5</div>
                </div>
                <!-- rotten tomatoes -->
                <div class="mb-3">
                    <label for="rotten" class="form-label">Rotten Tomatoes Score</label>
                    <input type="text" class="form-control" id="rotten" name="rotten">
                    <div id="rotten" class="form-text">Insert Rotten Tomatoes Score e.g. 70</div>
                </div>
                <!-- netflix -->
                <div class="mb-3">
                    <label for="netflix" class="form-label">Netflix</label>
                    <input type="text" class="form-control" id="netflix" name="netflix">
                    <div id="netflix" class="form-text">Insert '1' if it's on Netlix. Insert '0' if it's not on Netflix</div>
                </div>
                <!-- hulu -->
                <div class="mb-3">
                    <label for="hulu" class="form-label">Hulu</label>
                    <input type="text" class="form-control" id="hulu" name="hulu">
                    <div id="hulu" class="form-text">Insert '1' if it's on Hulu. Insert '0' if it's not on Hulu</div>
                </div>
                <!-- prime -->
                <div class="mb-3">
                    <label for="prime" class="form-label">Prime Video</label>
                    <input type="text" class="form-control" id="prime" name="prime">
                    <div id="prime" class="form-text">Insert '1' if it's on Prime Video. Insert '0' if it's not on Prime Video</div>
                </div>
                <!-- disney -->
                <div class="mb-3">
                    <label for="disney" class="form-label">Disney+</label>
                    <input type="text" class="form-control" id="disney" name="disney">
                    <div id="disney" class="form-text">Insert '1' if it's on Disney+. Insert '0' if it's not on Disney+</div>
                </div>
                <!-- winner -->
                <div class="mb-3">
                    <label for="winner" class="form-label">Winner</label>
                    <input type="text" class="form-control" id="winner" name="winner">
                    <div id="winner" class="form-text">Insert '1' if it's a winner. Insert '0' if it's not a winner</div>
                </div>
                <!-- featured -->
                <div class="mb-3">
                    <label for="featured" class="form-label">Featured</label>
                    <input type="text" class="form-control" id="featured" name="featured">
                    <div id="featured" class="form-text">Insert '1' if it's featured. Insert '0' if it's not featured</div>
                </div>
                <!-- top rated -->
                <div class="mb-3">
                    <label for="topRated" class="form-label">Top Rated</label>
                    <input type="text" class="form-control" id="topRated" name="topRated">
                    <div id="topRated" class="form-text">Insert '1' if it's top rated. Insert '0' if it's not top rated</div>
                </div>
                <!-- explore whats streaming -->
                <div class="mb-3">
                    <label for="explore" class="form-label">Explore What's Streaming</label>
                    <input type="text" class="form-control" id="explore" name="explore">
                    <div id="explore" class="form-text">Insert '1' if it's streaming. Insert '0' if it's not streaming</div>
                </div>


                <!-- <a href='add.php'><button type="submit" class="btn btn-primary">Submit</button></a> -->
                <button type="submit" class="btn btn-md btn-outline-default">Add</button>
            </form>
            <br>
            <br>
        </div>


    </main>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>

</html>