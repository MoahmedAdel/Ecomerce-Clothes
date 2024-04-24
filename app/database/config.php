<?php


class config
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "ecommerce_clothes";
    private $connect;
    public function __construct()
    {
        try {
            $this->connect = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);
            if ($this->connect->connect_errno) {
                // Connection failed, throw exception
                throw new Exception("Database connection failed: " . $this->connect->connect_error);
            }
        } catch (Exception $e) {
            // Handle the exception gracefully
            header("HTTP/1.0 404 Not Found");
            die();
        }
    }

    // DML -> insert update delete 
    public function runDML(string $quary): bool
    {
        $result = $this->connect->query($quary);
        if ($result) {
            return true;
        }
        return false;

    }

    // DQL -> select
    public function runDQL(string $quary)
    {
        $result = $this->connect->query($quary);
        if ($result->num_rows > 0) {
            return $result;
        }
        return [];
    }
}