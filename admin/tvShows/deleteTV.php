<?php
// session start
if (!isset($_SESSION)) {
  session_start();
}
// if user not logged in return them to index.php
if(!isset($_SESSION['admin'])){
  header("Location: ../index.php");
}
include '../../connections/db.php';

$conn->set_charset('utf8');

// $iddata = $conn->real_escape_string($_POST["rowid"]);
$iddata = htmlentities($_GET["row_id"]);

$deleteQ = "DELETE FROM tv_shows WHERE id = '$iddata'";

$result = $conn->query($deleteQ);

if(!$result){
  echo $conn->error;
} else {
  echo "success";
}

$_SESSION['delete_success'] = "<div class='alert alert-success d-flex justify-content-center text-center'>TV Show deleted successfully!</div>";
header("Location: index.php?delete_success");