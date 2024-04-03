<?php
include_once "../Validation.php";
include_once "../../models/User.php";
include_once "../../services/mail.php";

// --> login 

if ($_POST["submit"]) {
    // validation on input userNameOrEmail  
    $userNameOrEmailValidation = new Validation("user_name", $_POST["email_or_username"]);
    $userNameOrEmailRequired = $userNameOrEmailValidation->Required();
    if (empty($userNameOrEmailRequired)) {
        $userNameOrEmailValidation->Filter();
        $userNameOrEmailIsString = $userNameOrEmailValidation->IsString();
        if (empty($userNameOrEmailIsString)) {
            $_SESSION["values"]["login"]["email"] = $_POST["email_or_username"];
        } else {
            $_SESSION["errors"]["login"]["email_or_username"]["isString"] = $userNameOrEmailIsString;
        }
    } else {
        $_SESSION["errors"]["login"]["email_or_username"]["required"] = $userNameOrEmailRequired;
    }

    // validation on input password  
    $passwordValidation = new Validation("password", $_POST["password"]);
    $passwordRequired = $passwordValidation->Required();
    if (empty($passwordRequired)) {
        $passwordValidation->Filter();
    } else {
        $_SESSION["errors"]["login"]["password"]["required"] = $passwordRequired;
    }

    //check if validation is done or no 
    if (empty($_SESSION["errors"]["login"])) {
        $patternEmail = "/^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/";
        $patternUserName = "/^[a-zA-Z][a-zA-Z0-9_]{2,15}/";
        $EmailRegex = $userNameOrEmailValidation->Regex($patternEmail);
        $userNameRegex = $userNameOrEmailValidation->Regex($patternUserName);
        // if user will be login with -> Email
        if (empty($EmailRegex)) {
            $userObject = new User();
            $userObject->setEmail($_POST['email_or_username']);
            $resultEmail = $userObject->checkEmail();
            if ($resultEmail) {
                $userObject->setPassword($_POST['password']);
                $result = $userObject->loginEmail();
                if ($result) {
                    $user = $result->fetch_object();
                    if ($user->status == 1) {
                        $_SESSION["user"] = $user;
                    } else if ($user->status == 2) {
                        $_SESSION["errors"]["login"]["block"] = "Sorry , Your Account Has Been Blocked";
                        header("location:../../../resources/views/User/login.php");
                        die();
                    } else if ($user->status == 0) {
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
                        $mail = new Mail($_POST["email_or_username"], $subject, $body);
                        $mailResult = $mail->send();
                        if ($mailResult) {
                            header('location:../../../resources/views/User/verification-code.php?user_name=' . $user->user_name);
                            die();
                        } else {
                            header("location:../../../resources/views/MainPages/404.php");
                            die();
                        }
                    }
                } else {
                    $_SESSION["errors"]["login"]["password"]["wrong"] = "Password Is Incorrect";
                    header("location:../../../resources/views/User/login.php");
                    die();
                }
            } else {
                $_SESSION['errors']['login']['email_or_username']['notFound'] = "Email Is Not Found";
                header("location:../../../resources/views/User/login.php");
                die();
            }
        }
        // if user will be login with -> Email
        else if (empty($userNameRegex)) {
            $userObject = new User();
            $userObject->setUser_name($_POST['email_or_username']);
            $resultUserName = $userObject->checkUserName();
            if ($resultUserName) {
                $userObject->setPassword($_POST['password']);
                $result = $userObject->loginUserName();
                if ($result) {
                    $user = $result->fetch_object();
                    if ($user->status == 1) {
                        $_SESSION["user"] = $user;
                    } else if ($user->status == 2) {
                        $_SESSION["errors"]["login"]["block"] = "Sorry , Your Account Has Been Blocked";
                        header("location:../../../resources/views/User/login.php");
                        die();
                    } else if ($user->status == 0) {
                        $code = rand(10000, 99999);
                        $userObject->setCode_email_verified($code);
                        $userObject->setEmail($user->email);    // setEmail method becouse method updateCodeVerified to be update with email 
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
                        $mail = new Mail($user->email, $subject, $body);
                        $mailResult = $mail->send();
                        if ($mailResult) {
                            header('location:../../../resources/views/User/verification-code.php?user_name=' . $user->user_name);
                            die();
                        } else {
                            header("location:../../../resources/views/MainPages/404.php");
                            die();
                        }
                    }
                } else {
                    $_SESSION["errors"]["login"]["password"]["wrong"] = "Password Is Incorrect";
                    header("location:../../../resources/views/User/login.php");
                    die();
                }
            } else {
                $_SESSION['errors']['login']['email_or_username']['notFound'] = "User Name Is Not Found";
                header("location:../../../resources/views/User/login.php");
                die();
            }
        } else {
            $_SESSION['errors']['login']['email_or_username']['invalid'] = "Input Is Invalid";
            header("location:../../../resources/views/User/login.php");
            die();
        }
    }
} else {
    header("location:../../../resources/views/MainPages/404.php");
    die();
}
if (empty($_SESSION["errors"]["login"]) && isset($_SESSION["user"])) {
    header("location:../../../resources/views/MainPages/index.php");
    die();
} else {
    header("location:../../../resources/views/User/login.php");
    die();
}