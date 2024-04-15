<?php
ob_start();
session_start();

// get cookie from browser  

// check cookie user have user_name or email 
// if COOKIE have email
if (isset($_COOKIE["remember-me-user-e"])) {
    include_once "../../../app/models/User.php";
    $userObject = new User;
    $userObject->setEmail($_COOKIE["remember-me-user-e"]);
    $result = $userObject->checkEmail();
    $user = $result->fetch_object();
    $_SESSION["user"] = $user;
} else if (isset($_COOKIE["remember-me-user-u"])) {
    include_once "../../../app/models/User.php";
    $userObject = new User;
    $userObject->setUser_name($_COOKIE["remember-me-user-u"]);
    $result = $userObject->checkUserName();
    $user = $result->fetch_object();
    $_SESSION["user"] = $user;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?= $title ?>
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../assets/css/libraries/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/libraries/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/libraries/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/user/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/user/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/user/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css//user/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?= isset($links) ? $links : '' ?>
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>