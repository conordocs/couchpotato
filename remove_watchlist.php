<?php
// session start
if (!isset($_SESSION)) {
  session_start();
}
// if user not logged in return them to index.php
if(!isset($_SESSION['user'])){
  header("Location: ../index.php");
}
include 'connections/db.php';

$conn->set_charset('utf8');

// $iddata = $conn->real_escape_string($_POST["rowid"]);
$iddata = htmlentities($_GET["fav_id"]);

$deleteQ = "DELETE FROM tv_watchlist WHERE id = '$iddata'";

$result = $conn->query($deleteQ);

if(!$result){
  echo $conn->error;
} else {
  echo "success";
}

$_SESSION['remove_success'] = "<div class='alert alert-success d-flex justify-content-center text-center'>Removed Successfully!</div>";
header("Location: watchlist.php?remove_success");