<?php

include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class Admin extends config implements operations
{
    private $id ;
    private $user_name;
    private $password ;
    private $first_name ;
    private $last_name ;
    private $email ;
    private $phone ;
    private $image ;
    private $gender;
    private $role ;
    private $status ;
    private $create_at ;
    private $update_at ;

    /**
     * Get the value of user_name
     */ 
    public function getUser_name()
    {
        return $this->user_name;
    }

    /**
     * Set the value of user_name
     *
     * @return  self
     */ 
    public function setUser_name($user_name)
    {
        $this->user_name = $$user_name;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = sha1($password);

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of update_at
     */ 
    public function getUpdate_at()
    {
        return $this->update_at;
    }

    /**
     * Set the value of update_at
     *
     * @return  self
     */ 
    public function setUpdate_at($update_at)
    {
        $this->update_at = $update_at;

        return $this;
    }

    
    public function create(){}
    public function update(){}
    public function delete(){}
    public function read(){}
}