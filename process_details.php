<?php
// session start
if (!isset($_SESSION)) {
  session_start();
}
// if user not logged in return them to index.php
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
}

include 'connections/db.php';

$conn->set_charset('utf8');

$iddata = $_SESSION['user'];
$first_name = $conn->real_escape_string($_POST["first_name"]);
$last_name = $conn->real_escape_string($_POST["last_name"]);
$about = $conn->real_escape_string($_POST["about"]);

$editQ = "UPDATE tv_users SET first_name='$first_name',last_name='$last_name',about='$about' WHERE id = '$iddata'";

$result = $conn->query($editQ);

if (!$result) {
  echo $conn->error;
} else {
  echo "success";
}

$_SESSION['profile_edit_success'] = "<div class='alert alert-success d-flex justify-content-center text-center'>Details Edited Successfully!</div>";
header("Location: profile.php?profile_edit_success");
