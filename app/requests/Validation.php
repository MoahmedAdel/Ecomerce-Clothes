<?php
include_once __DIR__ . "\..\database\config.php";
class Validation
{
    private $name;
    private $value;
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    //create method check if inputvalue is empty or no
    public function Required(): string
    {
        return (empty($this->value) ? "$this->name is Required" : "");
    }

    //craete method to input value with specific pattern
    public function Regex($pattern): string
    {
        return (preg_match($pattern, $this->value) ? "" : "$this->name is Invalid");
    }

    // create Method to check input unique or not
    public function Unique($table)
    {
        $query = ("SELECT * FROM `$table` WHERE `$this->name` = '$this->value'");
        $config = new config;
        $result = $config->runDQL($query);
        return (empty($result) ? "" : "this $this->name is already exists");
    }

    //create method to check value confirmed
    public function Confirmed($valueConfirmation): string
    {
        return (($this->value == $valueConfirmation) ? "" : "$this->name not Confirmed");
    }

    //create method to check the input is string or not
    public function IsString(): string
    {
        return (!is_numeric($this->value)) ? "" : "Please Enter String Value";
    }
    public function LengthAge($minAge, $maxAge): string
{
    $currentDate = new DateTime(); // Create a new DateTime object for the current date
    $age = new DateTime($this->value); // Assuming $this->value contains the date of birth
    $intervalTime = $age->diff($currentDate)->format('%y');
    // Check if the age falls within the specified range
    if ($intervalTime >= $minAge && $intervalTime <= $maxAge) {
        return ""; // Age falls within the range, return an empty string
    } else {
        return "$this->name must be between $minAge and $maxAge years old"; // Age is outside the range, return an error message
    }
}
    //create method to filter input 
    public function Filter()
    {
        $this->value = trim($this->value); // Remove leading and trailing whitespace
        $this->value = stripslashes($this->value); // Remove backslashes
        $this->value = strip_tags($this->value); // Remove HTML tags
        $this->value = htmlspecialchars($this->value); // Convert special characters to HTML entities
        return $this->value;
    }
}
