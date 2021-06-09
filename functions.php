<?php

function set_previous_page_url(){

$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
$previous_url = $_SERVER['HTTP_REFERER'];
if (!($current_url === $previous_url)){
    $_SESSION['redirect_url'] = $previous_url;
}
if(isset($_SESSION['redirect_url'])){
    $url = $_SESSION['redirect_url'];
    return $url;

} else {
    $url = "index.php";
    return $url;
}
}
?>