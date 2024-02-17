<?php
session_start();
include_once "Validation.php";
include_once "../models/User.php";
include_once "../services/mail.php";

if ($_POST["submit"]) {
    // validation on input userNameOrEmail  
    $userNameOrEmailValidation = new Validation("email_or_username", $_POST["email_or_username"]);
    $userNameOrEmailRequired = $userNameOrEmailValidation->Required();
    if (empty($userNameOrEmailRequired)) {
        $userNameOrEmailValidation->Filter();
        $userNameOrEmailIsString = $userNameOrEmailValidation->IsString();
        if (!empty($userNameOrEmailIsString)) {
            $_SESSION["errors"]["login"]["userNameOrEmail"]["isString"] = $userNameOrEmailIsString;
        }
    } else {
        $_SESSION["errors"]["login"]["userNameOrEmail"]["required"] = $userNameOrEmailRequired;
    }

    // validation on input password  
    $passwordValidation = new Validation("password", $_POST["password"]);
    $passwordRequired = $passwordValidation->Required();
    if (empty($passwordRequired)) {
        $passwordValidation->Filter();
    } else {
        $_SESSION["errors"]["login"]["password"]["required"] = $passwordRequired;
    }

    // validation on radio input type_of_user
    $typeOfUserValidation = new Validation("type", $_POST["type"]);
    $typeOfUserRequired = $typeOfUserValidation->Required();
    if (empty($typeOfUserRequired)) {
        $patternType = "/^(admin|staff|user)$/";
        $typeOfUserRegex = $typeOfUserValidation->Regex($patternType);
        if (!empty($typeOfUserRegex)) {
            $_SESSION["errors"]["login"]["type"]["regex"] = $typeOfUserRegex;
        }
    } else {
        $_SESSION["errors"]["login"]["type"]["required"] = $typeOfUserRequired;
    }

    //
    if ($_POST["type"] == "admin" && empty($_SESSION["errors"]["login"])) {

    } else if ($_POST["type"] == "staff" && empty($_SESSION["errors"]["login"])) {

    } else if ($_POST["type"] == "user" && empty($_SESSION["errors"]["login"])) {
        $patternEmail = "/^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/";
        $userNameOrEmailRegex = $userNameOrEmailValidation->Regex($patternEmail);
        // if not find $userNameOrEmailRegex -> Email
        if (empty($userNameOrEmailRegex)) {
            $userObject = new User();
            $userObject->setEmail($_POST['email_or_username']);
            $userObject->setPassword($_POST['password']);
            $result = $userObject->loginEmail();
            if ($result) {
                $user = $result->fetch_object();
                if ($user->status == 1) {

                } else if ($user->status == 0) {
                    $subject = "verification code";
                    $body = "
        <div style='text-align:center;'>
            <h1 style='font-weight:bold;margin-bottom:8px;'>Hello {$user->first_name} {$user->last_name}</h1>
            <p style='font-size:16px;'>Thank you for signing up!</p>
            <p style='font-size:16px;'>Your verification code is: <b style='color:blue;'>$user->code_email_verified</b></p>
            <p style='font-size:16px;'>Please use this code to complete your registration process.</p>
            <p style='font-size:16px;'>If you have any questions or need further assistance, feel free to contact us.</p>
            <br>
            <p style='font-size:16px;'>Best regards,</p>
            <p style='font-size:16px;'>[Ecommerce Clothes]</p>
        </div>";
                    $mail = new Mail($_POST["email_or_username"], $subject, $body);
                    $mailResult = $mail->send();
                    if ($mailResult) {
                        header('location:../../verification-code.php?user_name=' . $user->user_name);
                        die();
                    } else {
                        header("location:../../404.php");
                        die();
                    }
                } else if ($user->status == 2) {

                }
            }
        }
        // if find $userNameOrEmailRegex -> user name
        else {

        }
    }
}
