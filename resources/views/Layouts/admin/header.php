<?php
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

include_once __DIR__ . "\..\..\..\..\app\middleware\admin\main-admin\auth.php";
// get cookie from browser "main-admin , sub-admin" 

//main-admin
// check cookie main admin have user_name or email

// if COOKIE have email
if (isset($_COOKIE["remember-me-main-admin-e"])) {
    include_once __DIR__ . "\..\..\..\..\app\models\Admin.php";
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
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>

    <!-- link font google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- link tailwind output -->
    <link rel="stylesheet" href="<?= isset($base_url_style) ? $base_url_style : "" ?>tailwind.output.css" />

    <!-- link tailwind -->
    <link rel="stylesheet" href="<?= isset($base_url_style) ? $base_url_style : "" ?>tailwind.css" />

    <!-- link style -->
    <link rel="stylesheet" href="<?= isset($base_url_style) ? $base_url_style : "" ?>style.css" />

    <!-- link chart -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />

    <!-- link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">