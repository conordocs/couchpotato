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

$showid = htmlentities($_GET['show_id']);
$showquery = "SELECT * FROM tv_shows WHERE id = $showid";
$showresult = $conn->query($showquery);
while ($row = $showresult->fetch_assoc()) {
  // $showid = $row['id'];
  $showtitle = $row['title'];
  $showyear = $row['year'];
  $showage = $row['age'];
  $showIMDb = $row['IMDb'];
  $showrottentomatoes = $row['rotten_tomatoes'];
  $shownetflix = $row['netflix'];
  $showhulu = $row['hulu'];
  $showprimevideo = $row['prime_video'];
  $showdisney = $row['disney'];
  $showwinner = $row['winner'];
  $showfeatured = $row['featured'];
  $showtop = $row['top_rated'];
  $showexplore = $row['explore_whats_streaming'];
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
      <h2>Edit TV Show</h2>
      <?php

      echo "<form method='POST' action='editTV.php' enctype='multipart/form-data'>
    <!-- title -->
      <div class='mb-3'>
        <label for='title' class='form-label'>TV Show Title</label>
        <textarea class='form-control' width='20px' height='20px' name='title'>$showtitle</textarea>
      </div>
      <!-- year -->
      <div class='mb-3'>
        <label for='year' class='form-label'>Year</label>
        <textarea class='form-control' width='20px' height='20px' name='year'>$showyear</textarea>
        <div id='year' class='form-text'>Insert TV Show Release Year e.g. 2020</div>
      </div>
      <!-- age -->
      <div class='mb-3'>
        <label for='age' class='form-label'>Age Rating</label>
        <textarea class='form-control' width='20px' height='20px' name='age'>$showage</textarea>
        <div id='age' class='form-text'>Insert Age Rating e.g PG</div>
      </div>
      <!-- imdb -->
      <div class='mb-3'>
        <label for='imdb' class='form-label'>IMDB Score</label>
        <textarea class='form-control' width='20px' height='20px' name='imdb'>$showIMDb</textarea>
        <div id='imdb' class='form-text'>Insert IMDB Score e.g. 7.5</div>
      </div>
      <!-- rotten tomatoes -->
      <div class='mb-3'>
        <label for='rotten' class='form-label'>Rotten Tomatoes Score</label>
        <textarea class='form-control' width='20px' height='20px' name='rotten'>$showrottentomatoes</textarea>
        <div id='rotten' class='form-text'>Insert Rotten Tomatoes Score e.g. 70</div>
      </div>
      <!-- netflix -->
      <div class='mb-3'>
        <label for='netflix' class='form-label'>Netflix</label>
        <textarea class='form-control' width='20px' height='20px' name='netflix'>$shownetflix</textarea>
        <div id='netflix' class='form-text'>Insert '1' if it's on Netlix. Insert '0' if it's not on Netflix</div>
      </div>
      <!-- hulu -->
      <div class='mb-3'>
        <label for='hulu' class='form-label'>Hulu</label>
        <textarea class='form-control' width='20px' height='20px' name='hulu'>$showhulu</textarea>
        <div id='hulu' class='form-text'>Insert '1' if it's on Hulu. Insert '0' if it's not on Hulu</div>
      </div>
      <!-- prime -->
      <div class='mb-3'>
        <label for='prime' class='form-label'>Prime Video</label>
        <textarea class='form-control' width='20px' height='20px' name='prime'>$showprimevideo</textarea>
        <div id='prime' class='form-text'>Insert '1' if it's on Prime Video. Insert '0' if it's not on Prime Video</div>
      </div>
      <!-- disney -->
      <div class='mb-3'>
        <label for='disney' class='form-label'>Disney+</label>
        <textarea class='form-control' width='20px' height='20px' name='disney'>$showdisney</textarea>
        <div id='disney' class='form-text'>Insert '1' if it's on Disney+. Insert '0' if it's not on Disney+</div>
      </div>
      <!-- winner -->
      <div class='mb-3'>
        <label for='winner' class='form-label'>Winner</label>
        <textarea class='form-control' width='20px' height='20px' name='winner'>$showwinner</textarea>
        <div id='winner' class='form-text'>Insert '1' if it's a winner. Insert '0' if it's not a winner</div>
      </div>
      <!-- featured -->
      <div class='mb-3'>
        <label for='featured' class='form-label'>Featured</label>
        <textarea class='form-control' width='20px' height='20px' name='featured'>$showfeatured</textarea>
        <div id='featured' class='form-text'>Insert '1' if it's featured. Insert '0' if it's not featured</div>
      </div>
      <!-- top rated -->
      <div class='mb-3'>
        <label for='topRated' class='form-label'>Top Rated</label>
        <textarea class='form-control' width='20px' height='20px' name='topRated'>$showtop</textarea>
        <div id='topRated' class='form-text'>Insert '1' if it's top rated. Insert '0' if it's not top rated</div>
      </div>
      <!-- explore whats streaming -->
      <div class='mb-3'>
        <label for='explore' class='form-label'>Explore What's Streaming</label>
        <textarea class='form-control' width='20px' height='20px' name='explore'>$showexplore</textarea>
        <div id='explore' class='form-text'>Insert '1' if it's streaming. Insert '0' if it's not streaming</div>
      </div>
      
      <input type='hidden' name='rowid' value='$showid'>
      
      
        <div class='row'>
            <div class='col-md-1'>
                <button class='btn submit_btn' id='upload' type='submit'>Edit</button>
            </div>
            <div class='col-md-1'>
              <a class='btn submit_btn' href='deleteTV.php?row_id=$showid'>Delete</a>
            </div>
            <div class='col-md-10'>
              
            </div>
        </div>
        </form>
        
        ";
      ?>
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