<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../connections/db.php';
    if (isset($_POST['signin'])) {
        // login php script
        $myUser = $_POST['user'];
        $myPass = $_POST['password'];
        // $myPass = md5($myPass);
        $checkUser = "SELECT * FROM tv_admin WHERE username = '$myUser' AND password = '$myPass'";
        $result = $conn->query($checkUser);
        $num = $result->num_rows;

        if ($num > 0) {
            while ($row = $result->fetch_assoc()) {
                $userID = $row['id'];
                $_SESSION['admin'] = $userID;

                header("location: tvShows/index.php");
                echo '<div class="alert alert-success d-flex justify-content-center">Welcome Back!</div>';
            }
            
        } else {
            $_SESSION['login_fail'] = "<div class='alert alert-danger d-flex justify-content-center text-center'>User not found. Please try again.</div>";
            header("Location: index.php?login_fail");
        }
    }
