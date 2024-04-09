<?php
session_start();

// get cookie from browser
if (isset($_COOKIE["remember_me_main-admin"])) {
    include_once "../../../../app/models/Admin.php";
    $mainAdminObject = new Admin();
    $mainAdminObject->setEmail($_COOKIE["remember_me_main-admin"]);
    $result = $mainAdminObject->GetAdminByEmail();
    $admin = $result->fetch_object();
    $_SESSION["main-admin"] = $admin;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TAILWIND CSS -->
    <link href="../../../../resources/assets/css/tailwind.css" rel="stylesheet">
    <!-- ALPINE JS -->

    <title>Better Code</title>
</head>

<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">