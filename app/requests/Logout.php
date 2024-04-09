<?php
session_start();

if ($_SESSION["user"]) {
    unset($_SESSION["user"]);
    header("location:../../resources/views/User/login.php");
}

if($_SESSION["main-admin"]){
    unset($_SESSION["main-admin"]);
    header("location:../../resources/views/Admin/login.php");
    setcookie("remember_me_main-admin","",time()-100,"/");
}