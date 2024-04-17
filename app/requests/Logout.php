<?php
session_start();

if (isset($_SESSION["user"])) {
    unset($_SESSION["user"]);
    header("location:../../resources/views/User/login.php");
    // check if cookie "email , user_name" and remove this 
    if (isset($_COOKIE["remember-me-user-e"])) {
        setcookie("remember-me-user-e", "", time() - 100, "/");
    } else if (isset($_COOKIE["remember-me-user-u"])) {
        setcookie("remember-me-user-u", "", time() - 100, "/");
    }
}

if (isset($_SESSION["main-admin"])) {
    unset($_SESSION["main-admin"]);
    header("location:../../resources/views/Admin/login.php");
    if (isset($_COOKIE["remember-me-main-admin-e"])) {
        setcookie("remember-me-main-admin-e", "", time() - 100, "/");
    } else if (isset($_COOKIE["remember-me-main-admin-u"])) {
        setcookie("remember-me-main-admin-u", "", time() - 100, "/");
    }
}