<?php
session_start();

if ($_SESSION["user"]) {
    unset($_SESSION["user"]);
    header("location:../../resources/views/User/login.php");
}