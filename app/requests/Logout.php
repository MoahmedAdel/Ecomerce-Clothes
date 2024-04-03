<?php
session_start();

if ($_SESSION["user"]) {
    unset($_SESSION["user"]);
    header("location:../../resources/views/User/login.php");
}

if($_SESSION["suber-admin"]){
    unset($_SESSION["suber-admin"]);
    header("location:../../resources/views/Admin/login.php");
}