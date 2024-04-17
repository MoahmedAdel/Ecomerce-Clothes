<?php

//allow guests prevent anythig

if (isset($_SESSION["main-admin"])) {
    $location = $_SERVER['HTTP_HOST'] . "/resources/views/Admin/main-admin/dashboard.php";
    header("location: http://$location");
    die();
} else if (isset($_SESSION["sub-admin"])) {
    header("location:sub-admin/dashboard.php");
    die();
}