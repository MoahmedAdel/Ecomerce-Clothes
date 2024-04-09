<?php

//allow guests prevent anythig

if (isset($_SESSION["main-admin"])) {
    header("location:main-admin/dashboard.php");
    die();
} else if (isset($_SESSION["sub-admin"])) {
    header("location:sub-admin/dashboard.php");
    die();
}