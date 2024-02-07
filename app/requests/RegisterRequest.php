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
        public function SpecificInputValidation($pattern,$table)
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
                    }
                    else{
                        $_SESSION["errors"]["$this->name"]["unique"] = $spacificInputUnique;
                    }
                } else {
                    $_SESSION["errors"]["$this->name"]["regex"] = $spacificInputRegex;
                }
            } else {
                $_SESSION["errors"]["$this->name"]["required"]= $spacificInputRequired;
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
    $pattern = "/^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/";
    $table = "users";
    $emailObject->SpecificInputValidation($pattern,$table);
}
if (empty($_SESSION["errors"])) {
    var_dump($_POST);
} else {
    header("location:../../register.php");
}
