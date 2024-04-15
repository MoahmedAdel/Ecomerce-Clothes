<?php
session_start();

// get cookie from browser "main-admin , sub-admin" 

//main-admin
// check cookie main admin have user_name or email

// if COOKIE have email
if (isset($_COOKIE["remember-me-main-admin-e"])) {
    include_once "../../../../app/models/Admin.php";
    $mainAdminObject = new Admin();
    $mainAdminObject->setEmail($_COOKIE["remember-me-main-admin-e"]);
    $result = $mainAdminObject->GetAdminByEmail();
    $admin = $result->fetch_object();
    $_SESSION["main-admin"] = $admin;
}

// if COOKIE have user-name
else if (isset($_COOKIE["remember-me-main-admin-u"])) {
    include_once "../../../../app/models/Admin.php";
    $mainAdminObject = new Admin();
    $mainAdminObject->setUser_name($_COOKIE["remember-me-main-admin-u"]);
    $result = $mainAdminObject->GetAdminByUserName();
    $admin = $result->fetch_object();
    $_SESSION["main-admin"] = $admin;
}

//sub-admin


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- tailwind cdn link  -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- style link  -->
    <link rel="stylesheet" href="../../../../resources/assets/css/admin/style.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <title>Better Code</title>
</head>

<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">