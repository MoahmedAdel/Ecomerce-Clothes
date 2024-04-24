<?php
include_once "../Validation.php";
include_once "../../models/Admin.php";

// --> login 

if ($_POST["submit"]) {
    // validation on input userNameOrEmail  
    $userNameOrEmailValidation = new Validation("user_name", $_POST["email_or_username"]);
    $userNameOrEmailRequired = $userNameOrEmailValidation->Required();
    if (empty($userNameOrEmailRequired)) {
        $userNameOrEmailValidation->Filter();
        $userNameOrEmailIsString = $userNameOrEmailValidation->IsString();
        if ($userNameOrEmailIsString) {
            $_SESSION["errors"]["login-admin"]["email_or_username"]["isString"] = $userNameOrEmailIsString;
        } else {
            $_SESSION["values"]["login-admin"]["email"] = $_POST["email_or_username"];
        }
    } else {
        $_SESSION["errors"]["login-admin"]["email_or_username"]["required"] = $userNameOrEmailRequired;
    }

    // validation on input password  
    $passwordValidation = new Validation("password", $_POST["password"]);
    $passwordRequired = $passwordValidation->Required();
    if (empty($passwordRequired)) {
        $passwordValidation->Filter();
    } else {
        $_SESSION["errors"]["login-admin"]["password"]["required"] = $passwordRequired;
    }

    // *search in database if find admin or no* //
    $patternEmail = "/^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/";
    $patternUserName = "/^[a-zA-Z][a-zA-Z0-9_]{2,15}/";
    $emailRegex = $userNameOrEmailValidation->Regex($patternEmail);
    $userNameRegex = $userNameOrEmailValidation->Regex($patternUserName);

    //object from admin
    $adminObject = new Admin();

    // if admin will be login with -> Email
    if (empty($emailRegex)) {
        $adminObject->setEmail($_POST['email_or_username']);
        $adminObject->setPassword($_POST['password']);
        $result = $adminObject->loginEmail();
        //if find admin
        if ($result) {
            $admin = $result->fetch_object();

            //check if admin is blocked(0) or no(1)
            if ($admin->status == 1) {
                // check if admin is "main admin = 1" or "sub admin = 2"
                if ($admin->role == 1) {
                    if (isset($_POST["remember_me"])) {
                        setcookie('remember-me-main-admin-e', $_POST["email_or_username"], time() + (24 * 60 * 60) * 30, "/");
                    }
                    $_SESSION["main-admin"] = $admin;
                    header("location:../../../resources/views/Admin/main-admin/index.php");
                    die();
                } else if ($admin->role == 2) {
                    $_SESSION["sub-admin"] = $admin;
                    //header to dashboadrd sub admin 
                }
            } else {
                $_SESSION["errors"]["login-admin"]['status-login']["block"] = "Sorry , Your Account Has Been Blocked";
            }
        } else {
            $_SESSION["errors"]["login-admin"]['status-login']["invaliad"] = "Invalid Email or Password";
        }
    }

    // if admin will be login with -> User Name
    else if (empty($userNameRegex)) {
        $adminObject->setUser_name($_POST['email_or_username']);
        $adminObject->setPassword($_POST['password']);
        $result = $adminObject->loginUserName();
        //if find admin
        if ($result) {
            $admin = $result->fetch_object();

            //check if admin is blocked(0) or no(1)
            if ($admin->status == 1) {
                // check if admin is "main admin = 1" or "sub admin = 2"
                if ($admin->role == 1) {
                    if (isset($_POST["remember_me"])) {
                        setcookie('remember-me-main-admin-u', $_POST["email_or_username"], time() + (24 * 60 * 60) * 30, "/");
                    }
                    $_SESSION["main-admin"] = $admin;
                    header("location:../../../resources/views/Admin/main-admin/index.php");
                    die();
                    ///////// '_'
                } else if ($admin->role == 2) {
                    $_SESSION["sub-admin"] = $admin;
                    //header to dashboadrd sub admin 
                }
            } else {
                $_SESSION["errors"]["login-admin"]['status-login']["block"] = "Sorry , Your Account Has Been Blocked";
            }
        } else {
            $_SESSION["errors"]["login-admin"]['status-login']["invaliad"] = "Invalid User name or Password";
        }
    } else {

    }
    //check if validation is done or no 
    if (isset($_SESSION["errors"]["login-admin"])) {
        header("location:../../../resources/views/Admin/login.php");
        die();
    }
} else {
    header("location:../../../resources/views/MainPages/404.php");
    die();
}