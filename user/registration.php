<?php

session_start();

include ("../connections/db.php");

$name = $_POST['user'];
$pass = $_POST['password'];
$pass = md5($pass);

$user = "SELECT * FROM tv_users WHERE name = '$name'";

$result = $conn->query($user);

$num = $result->num_rows;

if($num > 0){
    echo "username already taken";
} else {
    $reg = "INSERT INTO tv_users (username, password) values ('$name', '$pass')";
    $result2 = $conn->query($reg);
    //mysqli_query($reg);
    header("location: login.php");
    echo "registration successful";
}

?>