<?php
include_once "Validation.php";
session_start();

if (isset($_POST["submit"])) {
    //validation for frist name
    class RegisterRequest
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
            $nameValidation = new Validation($this->name, $this->value);
            $nameRequired = $nameValidation->Required();
            if (empty($nameRequired)) {
                $nameValidation->Filter();
                $nameIsString = $nameValidation->IsString();
                if (empty($nameIsString)) {
                    $_SESSION["values"]["$this->name"] = $this->value;
                } else {
                    $_SESSION["errors"]["$this->name"]["isString"] = $nameIsString;
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"] = $nameRequired;
            }
        }
        //validation method for user_name | different to method NameValidation -> must be uniqe()
        public function UserNameValidation($table)
        {
            $userNameValidation = new Validation($this->name, $this->value);
            $userNameRequired = $userNameValidation->Required();
            if (empty($userNameRequired)) {
                $userNameValidation->Filter();
                $userNameIsString = $userNameValidation->IsString();
                if (empty($userNameIsString)) {
                    $userNameUnique = $userNameValidation->Unique($table);
                    if (empty($userNameUnique)) {
                        $_SESSION["values"]["$this->name"] = $this->name;
                    } else {
                        $_SESSION["errors"]["$this->name"]["unique"] = $userNameUnique;
                    }
                } else {
                    $_SESSION["errors"]["$this->name"]["isString"] = $userNameIsString;
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"] = $userNameRequired;
            }
        }
        //validation method for input need Regex and must be unique such (email and phone)
        public function SpecificInputValidation($pattern, $table)
        {
            $specificInputValidation = new Validation($this->name, $this->value);
            $spacificInputRequired = $specificInputValidation->Required();
            if (empty($spacificInputRequired)) {
                $specificInputValidation->Filter();
                $spacificInputRegex = $specificInputValidation->Regex($pattern);
                if (empty($spacificInputRegex)) {
                    $spacificInputUnique = $specificInputValidation->Unique($table);
                    if (empty($spacificInputUnique)) {
                        $_SESSION["values"]["$this->name"] = $this->value;
                    } else {
                        $_SESSION["errors"]["$this->name"]["unique"] = $spacificInputUnique;
                    }
                } else {
                    $_SESSION["errors"]["$this->name"]["regex"] = $spacificInputRegex;
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"] = $spacificInputRequired;
            }
        }
        //validation method for password 
        public function PasswordValidation($pattern)
        {
            $passwordValidation = new Validation($this->name, $this->value);
            $passwordRequired = $passwordValidation->Required();
            if (empty($passwordRequired)) {
                $passwordValidation->Filter();
                if (strlen($this->value) > 6 && strlen($this->value) < 13) {
                    $passwordRegex = $passwordValidation->Regex($pattern);
                    if (empty($passwordRegex)) {
                        $_SESSION["values"]["$this->name"] = $this->value;
                    } else {
                        $_SESSION["errors"]["$this->name"]["regex"] = $passwordRegex;
                    }
                } else {
                    $_SESSION["errors"]["$this->name"]["length"] = "password length 6-13";
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"] = $passwordRequired;
            }
        }
        //validation method for Confirm Password 
        public function ConfirmPasswordValidation($confirmPassword)
        {
            $confirmPasswordValidation = new Validation($this->name, $this->value);
            $confirmPasswordRequired = $confirmPasswordValidation->Required();
            if (empty($confirmPasswordRequired)) {
                $confirmPasswordValidation->Filter();
                $confirmPasswordConfirmed = $confirmPasswordValidation->Confirmed($confirmPassword);
                if (empty($confirmPasswordConfirmed)) {
                    $_SESSION["values"]["$this->name"] = $this->value;
                } else {
                    $_SESSION["errors"]["$this->name"]["confirm"] = $confirmPasswordConfirmed;
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"] = $confirmPasswordRequired;
            }
        }
        //validation method for date
        public function DateValidation($pattern)
        {
            $dateValidation = new Validation($this->name, $this->value);
            $dateRequired = $dateValidation->Required();
            if (empty($dateRequired)) {
                $dateValidation->Filter();
                $dateRegex = $dateValidation->Regex($pattern);
                if (empty($dateRegex)) {
                    $_SESSION["values"]["$this->name"] = $this->value;
                } else {
                    $_SESSION["errors"]["$this->name"]["regex"] = $dateRegex;
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"] = $dateRequired;
            }
        }
        //validation method for gender
        public function GenderValidation($pattern)
        {
            $genderValidation = new Validation($this->name, $this->value);
            $genderRequired = $genderValidation->Required();
            if (empty($genderRequired)) {
                $genderRegex = $genderValidation->Regex($pattern);
                if (empty($genderRegex)) {
                    $_SESSION["values"]["$this->name"] = $this->value;
                } else {
                    $_SESSION["errors"]["$this->name"]["regex"] = $genderRegex;
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"] = $genderRequired;
            }
        }
    }
    //object for Validation NameValidation method
    $fristNameObject = new RegisterRequest("first_name", $_POST["first_name"]);
    $fristNameObject->NameValidation();
    $lastNameObject = new RegisterRequest("last_name", $_POST["last_name"]);
    $lastNameObject->NameValidation();

    //object for Validation UserNamrValidation method
    $userNameObject = new RegisterRequest("user_name", $_POST["user_name"]);
    $table = "users";
    $userNameObject->userNameValidation($table);

    //object for Validation SpecificInputValidation method (email)
    $emailObject = new RegisterRequest("email", $_POST["email"]);
    $patternEmail = "/^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/";
    $table = "users";
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
    $dateObject->DateValidation($patternDate);

    //object for Validation GenderValidation method
    $genderObject = new RegisterRequest("gender", $_POST["gender"]);
    $patternGender = "/^[m|f]$/";
    $genderObject->GenderValidation($patternGender);
}
if (empty($_SESSION["errors"])) {
    var_dump($_POST);
} else {
    header("location:../../register.php");
}
