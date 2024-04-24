<?php

// Check if session is not active
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

//allow guests prevent anythig
if (isset($_SESSION["main-admin"])) {
    $location = $_SERVER['HTTP_HOST'] . "/resources/views/Admin/main-admin/index.php";
    header("location: http://$location");
    die();
} else if (isset($_SESSION["sub-admin"])) {
    header("location:sub-admin/dashboard.php");
    die();
}