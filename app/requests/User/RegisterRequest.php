<?php
include_once "../Validation.php";
include_once "../../models/User.php";
include_once "../../services/mail.php";

if (isset($_POST["submit"])) {
    //validation for frist name
    class RegisterRequest extends Validation
    {
        private $name;
        private $value;
        public function __construct($name, $value)
        {
            $this->name = $name;
            $this->value = $value;
        }
        //validation method for frist and last name
        public function NameValidation()
        {
            parent::__construct($this->name, $this->value);
            $nameRequired = $this->Required();
            if (empty($nameRequired)) {
                $this->Filter();
                $nameIsString = $this->IsString();
                if (empty($nameIsString)) {
                    $_SESSION["values"]["register"]["$this->name"] = $this->value;
                } else {
                    $_SESSION["errors"]["register"]["$this->name"]["isString"] = $nameIsString;
                }
            } else {
                $_SESSION["errors"]["register"]["$this->name"]["required"] = $nameRequired;
            }
        }

        //validation method for input need Regex and must be unique such (email,phone,user_name )
        public function SpecificInputValidation($pattern, $table)
        {
            parent::__construct($this->name, $this->value);
            $spacificInputRequired = $this->Required();
            if (empty($spacificInputRequired)) {
                $this->Filter();
                $spacificInputRegex = $this->Regex($pattern);
                if (empty($spacificInputRegex)) {
                    $spacificInputUnique = $this->Unique($table);
                    if (empty($spacificInputUnique)) {
                        $_SESSION["values"]["register"]["$this->name"] = $this->value;
                    } else {
                        $_SESSION["errors"]["register"]["$this->name"]["unique"] = $spacificInputUnique;
                    }
                } else {
                    $_SESSION["errors"]["register"]["$this->name"]["regex"] = $spacificInputRegex;
                }
            } else {
                $_SESSION["errors"]["register"]["$this->name"]["required"] = $spacificInputRequired;
            }
        }
        //validation method for password 
        public function PasswordValidation($pattern)
        {
            parent::__construct($this->name, $this->value);
            $passwordRequired = $this->Required();
            if (empty($passwordRequired)) {
                $this->Filter();
                if (strlen($this->value) > 6 && strlen($this->value) < 13) {
                    $passwordRegex = $this->Regex($pattern);
                    if (empty($passwordRegex)) {
                        $_SESSION["values"]["register"]["$this->name"] = $this->value;
                    } else {
                        $_SESSION["errors"]["register"]["$this->name"]["regex"] = $passwordRegex;
                    }
                } else {
                    $_SESSION["errors"]["register"]["$this->name"]["length"] = "password length 6-13";
                }
            } else {
                $_SESSION["errors"]["register"]["$this->name"]["required"] = $passwordRequired;
            }
        }
        //validation method for Confirm Password 
        public function ConfirmPasswordValidation($confirmPassword)
        {
            parent::__construct($this->name, $this->value);
            $confirmPasswordRequired = $this->Required();
            if (empty($confirmPasswordRequired)) {
                $this->Filter();
                $confirmPasswordConfirmed = $this->Confirmed($confirmPassword);
                if (empty($confirmPasswordConfirmed) && !isset($_SESSION["errors"]["register"]["password"])) { //!isset($_SESSION["errors"]["password"] -> Becouse save password and confirmPassword when not found error in password 
                    $_SESSION["values"]["register"]["$this->name"] = $this->value;
                } else {
                    $_SESSION["errors"]["register"]["$this->name"]["confirm"] = $confirmPasswordConfirmed;
                }
            } else {
                $_SESSION["errors"]["register"]["$this->name"]["required"] = $confirmPasswordRequired;
            }
        }
        //validation method for date
        public function DateValidation($pattern, $minAge, $maxAge)
        {
            parent::__construct($this->name, $this->value);
            $dateRequired = $this->Required();
            if (empty($dateRequired)) {
                $this->Filter();
                $dateRegex = $this->Regex($pattern);
                if (empty($dateRegex)) {
                    $datelengthAge = $this->LengthAge($minAge, $maxAge);
                    if (empty($datelengthAge)) {
                        $_SESSION["values"]["register"]["$this->name"] = $this->value;
                    } else {
                        $_SESSION["errors"]["register"]["$this->name"]["lenghtAge"] = $datelengthAge;
                    }
                } else {
                    $_SESSION["errors"]["register"]["$this->name"]["regex"] = $dateRegex;
                }
            } else {
                $_SESSION["errors"]["register"]["$this->name"]["required"] = $dateRequired;
            }
        }
        //validation method for gender
        public function GenderValidation($pattern)
        {
            parent::__construct($this->name, $this->value);
            $genderRequired = $this->Required();
            if (empty($genderRequired)) {
                $genderRegex = $this->Regex($pattern);
                if (empty($genderRegex)) {
                    $_SESSION["values"]["register"]["$this->name"] = $this->value;
                } else {
                    $_SESSION["errors"]["register"]["$this->name"]["regex"] = $genderRegex;
                }
            } else {
                $_SESSION["errors"]["register"]["$this->name"]["required"] = $genderRequired;
            }
        }
    }
    //call function validation in this class
    $table = "users";

    //object for Validation NameValidation method
    $fristNameObject = new RegisterRequest("first_name", $_POST["first_name"]);
    $fristNameObject->NameValidation();
    $lastNameObject = new RegisterRequest("last_name", $_POST["last_name"]);
    $lastNameObject->NameValidation();

    //object for Validation UserNamrValidation method
    $userNameObject = new RegisterRequest("user_name", $_POST["user_name"]);
    $patternUserName = "/^[a-zA-Z][a-zA-Z0-9_]{2,15}/";
    $userNameObject->SpecificInputValidation($patternUserName,$table);

    //object for Validation SpecificInputValidation method (email)
    $emailObject = new RegisterRequest("email", $_POST["email"]);
    $patternEmail = "/^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/";
    $emailObject->SpecificInputValidation($patternEmail, $table);

    //object for Validation Password method
    $passwordObject = new RegisterRequest("password", $_POST["password"]);
    $patternPassword = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/";
    $passwordObject->PasswordValidation($patternPassword);

    //object for Validation ConfirmPassword method 
    $confirmPasswordObject = new RegisterRequest("confirm_password", $_POST["confirm_password"]);
    $confirmPasswordObject->ConfirmPasswordValidation($_POST["password"]);

    //object for Validation DateValidation method
    $dateObject = new RegisterRequest("date_of_birth", $_POST["date_of_birth"]);
    $patternDate = "/^\d{4}-\d{2}-\d{2}$/";
    $minAge = 10;
    $maxAge = 100;
    $dateObject->DateValidation($patternDate, $minAge, $maxAge);

    //object for Validation GenderValidation method
    $genderObject = new RegisterRequest("gender", $_POST["gender"]);
    $patternGender = "/^[m|f]$/";
    $genderObject->GenderValidation($patternGender);
}
if (empty($_SESSION["errors"]["register"])) {
    $userObject = new User;
    $userObject->setUser_name($_POST["user_name"]);
    $userObject->setPassword($_POST["password"]);
    $userObject->setFirst_name($_POST["first_name"]);
    $userObject->setLast_name($_POST["last_name"]);
    $userObject->setEmail($_POST["email"]);
    $userObject->setGender($_POST["gender"]);
    $userObject->setDate_of_birth($_POST["date_of_birth"]);
    $code = rand(10000, 99999);
    $userObject->setCode_email_verified($code);
    $result = $userObject->create();
    if ($result) {
            //load phpmailer write in cmd project -> composer require phpmailer/phpmailer
            $subject = "verification code";
            $body = "
        <div style='text-align:center;'>
            <h1 style='font-weight:bold;margin-bottom:8px;'>Hello {$_POST["first_name"]} {$_POST["last_name"]}</h1>
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
                header("location:../../../resources/views/User/verification-code.php?user_name=".$_POST['user_name']);
                die();
            } else {
                header("location:../../../resources/views/MainPages/404.php");
                die();
            }
    } else {
        header("location:../../../resources/views/User/register.php");
        die();
    }
} else {
    header("location:../../../resources/views/User/register.php");
    die();
}
