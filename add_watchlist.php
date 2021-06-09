<?php
session_start();
// if user not logged in return them to login
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
}

include 'connections/db.php';

$conn->set_charset('utf8');
$show_id = htmlentities($_GET["show_id"]);
$user_id = $_SESSION['user'];

$insertQ = "INSERT IGNORE INTO tv_watchlist(show_id, user_id) VALUES ('$show_id','$user_id')";

$result = $conn->query($insertQ);

if (!$result) {
  echo $conn->error;
}

$_SESSION['watch_success'] = "<div class='alert alert-success d-flex justify-content-center text-center'>TV Show added to Watchlist!</div>";
header("Location: watchlist.php?watch_success");
