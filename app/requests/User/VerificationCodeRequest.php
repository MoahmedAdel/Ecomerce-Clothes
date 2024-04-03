<?php
include_once "../Validation.php";
include_once "../../models/User.php";

if (isset($_POST["submit"])) {
    //validation on verification code
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
} else {
    header("location:../../../resources/views/MainPages/404.php");
    die();
}

if (!isset($_SESSION["errors"]["verificationCode"])) {
    $userObject = new User;
    $userObject->setUser_name($_POST["user_name"]);
    $userObject->setCode_email_verified($verificationCode);
    $result = $userObject->checkCode();

    // verification code to verifiy account
    if (isset($_POST["user_name"]) && !isset($_POST["reset"])) {
        if ($result) {
            $userObject->setStatus(1);
            $userObject->updateStatus();  // verified
            $userObject->updateVerifiedAt();
            header("location:../../../resources/views/User/login.php");
            die();
        } else {
            $_SESSION["errors"]["verificationCode"]["wrong"] = "code is wrong";
            header("location:../../../resources/views/User/verification-code.php?user_name=" . $_POST["user_name"]);
            die();
        }
    }

    // verification code to reset password
    else if (isset($_POST["user_name"]) && isset($_POST["reset"])) {
        if ($result) {
            header("location:../../../resources/views/User/reset-password.php?user_name=" . $_POST["user_name"]);
            die();
        } else {
            $_SESSION["errors"]["verificationCode"]["wrong"] = "code is wrong";
            header("location:../../../resources/views/User/verification-code.php?user_name=" . $_POST["user_name"] . '&reset=1');
            die();
        }
    }
} else {
    if (isset($_POST["user_name"]) && !isset($_POST["reset"])) {
        header("location:../../../resources/views/User/verification-code.php?user_name=" . $_POST["user_name"]);
        die();
    } else if (isset($_POST["user_name"]) && isset($_POST["reset"])) {
        header("location:../../../resources/views/User/verification-code.php?user_name=" . $_POST["user_name"] . '&reset=1');
        die();
    }
}
