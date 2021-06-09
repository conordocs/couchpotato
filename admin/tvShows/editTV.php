<?php
// session start
if (!isset($_SESSION)) {
  session_start();
}
// if user not logged in return them to index.php
if (!isset($_SESSION['admin'])) {
  header("Location: ../index.php");
}

include '../../connections/db.php';

$conn->set_charset('utf8');

$title = $conn->real_escape_string($_POST["title"]);
$year = $conn->real_escape_string($_POST["year"]);
$age = $conn->real_escape_string($_POST["age"]);
$imdb = $conn->real_escape_string($_POST["imdb"]);
$rotten = $conn->real_escape_string($_POST["rotten"]);
$netflix = $conn->real_escape_string($_POST["netflix"]);
$hulu = $conn->real_escape_string($_POST["hulu"]);
$prime = $conn->real_escape_string($_POST["prime"]);
$disney = $conn->real_escape_string($_POST["disney"]);
$winner = $conn->real_escape_string($_POST["winner"]);
$featured = $conn->real_escape_string($_POST["featured"]);
$topRated = $conn->real_escape_string($_POST["topRated"]);
$explore = $conn->real_escape_string($_POST["explore"]);
$iddata = $conn->real_escape_string($_POST["rowid"]);

$editQ = "UPDATE tv_shows SET title='$title',year='$year',age='$age',IMDb='$imdb',rotten_tomatoes='$rotten',netflix='$netflix',hulu='$hulu',prime_video='$prime',disney='$disney',winner='$winner',featured='$featured',top_rated='$topRated',explore_whats_streaming='$explore' WHERE id='$iddata'";

$result = $conn->query($editQ);

if (!$result) {
  echo $conn->error;
} else {
  echo "success";
}

$_SESSION['edit_success'] = "<div class='alert alert-success d-flex justify-content-center text-center'>TV Show edited successfully!</div>";
header("Location: index.php?edit_success");
