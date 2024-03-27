<?php
include_once "../Validation.php";
include_once "../../models/User.php";
include_once "../../services/mail.php";

// --> reset password

// 1 => validation email and send massage to email becouse to go reset password 

if (isset($_POST["email-reset-password"])) {

    //validation in email input

    $emailValidation = new Validation("email", $_POST["email"]);
    $emailRequired = $emailValidation->Required();
    if (empty($emailRequired)) {
        $patternEmail = "/^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/";
        $emailRegex = $emailValidation->Regex($patternEmail);
        if (empty($emailRegex)) {
            $_SESSION["values"]["resetPassword"]["email"] = $_POST["email"];
        } else {
            $_SESSION["errors"]["resetPassword"]["email"]["isString"] = $emailRegex;
        }
    } else {
        $_SESSION["errors"]["resetPassword"]["email"]["required"] = $emailRequired;
    }

    if (empty($_SESSION["errors"]["resetPassword"]["email"])) {
        $userObject = new User();
        $userObject->setEmail($_POST['email']);
        $resultEmail = $userObject->checkEmail();
        if ($resultEmail) {
            $user = $resultEmail->fetch_object();
            //accont is not verified
            if ($user->status == 0) {
                $code = rand(10000, 99999);
                $userObject->setCode_email_verified($code);
                $userObject->updateCodeVerified();
                $subject = "verification code";
                $body = "
        <div style='text-align:center;'>
            <h1 style='font-weight:bold;margin-bottom:8px;'>Hello {$user->first_name} {$user->last_name}</h1>
            <p style='font-size:16px;'>Thank you for signing up!</p>
            <p style='font-size:16px;'>Your verification code is: <b style='color:blue;'>$code</b></p>
            <p style='font-size:16px;'>Please use this code to complete your registration process.</p>
            <p style='font-size:16px;'>If you have any questions or need further assistance, feel free to contact us.</p>
            <br>
            <p style='font-size:16px;'>Best regards,</p>
            <p style='font-size:16px;'>[Ecommerce Clothes]</p>
        </div>";
                $mail = new Mail($_POST["email"], $subject, $body);
                $mailResult = $mail->send();
                if ($mailResult) {
                    header('location:../../../resources/views/User/verification-code.php?user_name=' . $user->user_name);
                    die();
                } else {
                    header("location:../../../resources/views/MainPages/404.php");
                    die();
                }
            }
            //account is verified
            else if ($user->status == 1) {
                $code = rand(10000, 99999);
                $userObject->setCode_email_verified($code);
                $userObject->updateCodeVerified();
                $subject = "verification code";
                $body = "
        <div style='text-align:center;'>
            <h1 style='font-weight:bold;margin-bottom:8px;'>Hello {$user->first_name} {$user->last_name}</h1>
            <p style='font-size:16px;'>We received a request to reset your password.</p>
            <p style='font-size:16px;'>Your verification code is: <b style='color:blue;'>$code</b></p>
            <p style='font-size:16px;'>Please use this code to reset your password.</p>
            <p style='font-size:16px;'>If you didn't request a password reset, please ignore this message.</p>
            <br>
            <p style='font-size:16px;'>Best regards,</p>
            <p style='font-size:16px;'>[Ecommerce Clothes]</p>
        </div>";
                $mail = new Mail($_POST["email"], $subject, $body);
                $mailResult = $mail->send();
                if ($mailResult) {
                    header('location:../../../resources/views/User/verification-code.php?user_name=' . $user->user_name . '&reset=1');
                    die();
                } else {
                    header("location:../../../resources/views/MainPages/404.php");
                    die();
                }
            }
            //account is blocked
            else if ($user->status == 2) {
                $_SESSION["errors"]["resetPassword"]["email"]["notFound"] = "Account Is Block";
                header("location:../../../resources/views/User/login.php");
                die();
            }
        } else {
            $_SESSION["errors"]["resetPassword"]["email"]["wrong"] = "email is Wrong";
            header("location:../../../resources/views/User/login.php");
            die();
        }
    } else {
        header("location:../../../resources/views/User/login.php");
        die();
    }
}

// 2 => validation on password and update password to database

if (isset($_POST["submit-reset-password"])) {

    //validation on new password
    $newPasswordValidation = new Validation("new-password", $_POST["new-password"]);
    $newPasswordRequired = $newPasswordValidation->Required();
    if (empty($newPasswordRequired)) {
        $newPasswordValidation->Filter();
        if (strlen($_POST["new-password"]) > 6 && strlen($_POST["new-password"]) < 13) {
            $patternNewPassword = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/";
            $newPasswordRegex = $newPasswordValidation->Regex($patternNewPassword);
            if (empty($newPasswordRegex)) {
                $_SESSION["values"]["resetPassword"]["password"]["new"] = $_POST["new-password"];
            } else {
                $_SESSION["errors"]["resetPassword"]["password"]["new"]["regex"] = $newPasswordRegex;
            }
        } else {
            $_SESSION["errors"]["resetPassword"]["password"]["new"]["length"] = "password length 6-13";
        }
    } else {
        $_SESSION["errors"]["resetPassword"]["password"]["new"]["required"] = $newPasswordRequired;
    }

    //validation on confirm password

    $confirmPasswordValidation = new Validation("confirm-password", $_POST["confirm-password"]);
    $confirmPasswordRequired = $confirmPasswordValidation->Required();
    if (empty($confirmPasswordRequired)) {
        $confirmPasswordValidation->Filter();
        $confirmPasswordConfirmed = $confirmPasswordValidation->Confirmed($_POST["new-password"]);
        if (!empty($confirmPasswordConfirmed)) {
            $_SESSION["errors"]["resetPassword"]["password"]["confirm"]["confirmed"] = $confirmPasswordConfirmed;
        }
    } else {
        $_SESSION["errors"]["resetPassword"]["password"]["confirm"]["required"] = $confirmPasswordRequired;
    }


    if (empty($_SESSION["errors"]["resetPassword"]["password"])) {
        $userObject = new User;
        $userObject->setUser_name($_GET["user_name"]);
        $userObject->setUser_name($_POST["new-password"]);
        $updatePassword = $userObject->updatePassword();
        if ($updatePassword) {
            header("location:../../../resources/views/User/login.php");
            die();
        } else {
            header("location:../../../resources/views/User/reset-password.php");
            die();
        }
    } else {
        header("location:../../../resources/views/User/reset-password.php");
        die();
    }
} else {
    header("location:../../../resources/views/MainPages/404.php");
    die();
}