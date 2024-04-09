<?php

//allow authenticated main_admins and prevent guests
if (empty($_SESSION["main-admin"])) {
    header("location:../login.php");
    die();
}
