<?php

//allow authenticated main_admins and prevent guests
if (!isset($_SESSION["main-admin"])) {
    echo "ass";
    $location = $_SERVER['HTTP_HOST'] . "/resources/views/Admin/login.php";
    header("location: http://$location");
    die();
}