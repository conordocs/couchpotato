<?php
session_start();
// if user not logged in return them to login
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

$insertQ = "INSERT INTO tv_shows (title, year, age, IMDb, rotten_tomatoes, netflix, hulu, prime_video, disney, winner, featured, top_rated, explore_whats_streaming) VALUES ('$title', '$year', '$age', '$imdb', '$rotten', '$netflix', '$hulu', '$prime', '$disney', '$winner', '$featured', '$topRated', '$explore')";

$result = $conn->query($insertQ);

if (!$result) {
  echo $conn->error;
}

$_SESSION['add_success'] = "<div class='alert alert-success d-flex justify-content-center text-center'>TV Show added successfully!</div>";
header("Location: index.php?add_success");
