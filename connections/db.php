<?php
    $myPass = "";
    $webs = "localhost";
    $dbName = "couchpotato";
    $myUser = "root";

    $conn = new mysqli($webs, $myUser, $myPass, $dbName);

    if($conn -> connect_errno) {
        echo "Failed to connect.".$conn->connect_error;
    }


?>