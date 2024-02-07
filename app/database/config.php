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
        $this->connect = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);

        //-> check connection database
        //     if($connection->connect_error){
        //         die("Connection failed: ". $connection->connect_error);
        //     }
        //     else{
        //         echo "Connection successfully";
        //     }
    }
    // DML -> insert update delete 
    public function runDML(string $quary): bool
    {
        $result = $this->connect->query($quary); 
        if ($result) 
        {
            return true;
        }
        return false;
        
    }
    // DQL -> select
    public function runDQL(string $quary)
    {
        $result = $this->connect->query($quary);
        if ($result->num_rows > 0){
            return $result;
        }
        return [] ;
    }
}