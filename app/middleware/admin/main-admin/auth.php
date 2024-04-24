<?php
// Check if session is not active
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

//allow authenticated main_admins and prevent guests
if (!isset($_SESSION["main-admin"])) {
    $location = $_SERVER['HTTP_HOST'] . "/resources/views/Admin/login.php";
    header("location: http://$location");
    die();
}