<?php
session_start();
include_once "Validation.php";
include_once "../models/User.php";

if (isset($_POST["submit"])) {
    $verificationCode = implode($_POST["verification_code"]);
    if ($verificationCode) {
        $VerificationCodeValidation = new Validation('verification_code', $verificationCode);
        $patternCode = "/\b(?:[1-9]\d{4}|[1-9]\d{3}[1-9])\b/";
        $codeRegex = $VerificationCodeValidation->Regex($patternCode);
        if ($codeRegex) {
            $_SESSION["errors"]["verificationCode"]["regex"] = $codeRegex;
        }
    } else {
        $_SESSION["errors"]["verificationCode"]["required"] = "code is required";
    }
}
if (empty($_SESSION["errors"]["verificationCode"])) {
    $userObject = new User;
    $userObject->setUser_name($_POST["user_name"]);
    $userObject->setCode_email_verified($verificationCode);
    $result = $userObject->checkCode();
    if ($result) {
        $verified = $userObject->updateStatus(1);  // verified
        header("location:../../login.php");
        die();
    } else {
        $_SESSION["errors"]["verificationCode"]["wrong"] = "code is wrong";
        header("location:../../verification-code.php?user_name=" . $_POST["user_name"]);
        die();
    }
} else {
    header("location:../../verification-code.php?user_name=" . $_POST["user_name"]);
    die();
}