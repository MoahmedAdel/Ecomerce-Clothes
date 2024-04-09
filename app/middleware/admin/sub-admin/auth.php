<?php

//allow authenticated main_admins and prevent guests
if (empty($_SESSION["sub-admin"])) {
    header("location:../login.php");
    die();
}
