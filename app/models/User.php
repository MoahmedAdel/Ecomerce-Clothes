<?php

include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class User extends config implements operations
{
    private $id;
    private $user_name;
    private $password;
    private $first_name;
    private $last_name;
    private $phone;
    private $email;
    private $image;
    private $gender;
    private $date_of_birth;
    private $code_email_verified;
    private $status;
    private $create_at;
    private $update_at;
    private $verified_at;
    private $sub_admin_id;
    public function create()
    {
        $query = "INSERT INTO users (user_name, password, first_name, last_name, email, gender, date_of_birth, code_email_verified)
        VALUES ('$this->user_name', '$this->password', '$this->first_name', '$this->last_name', '$this->email', '$this->gender',
        '$this->date_of_birth', '$this->code_email_verified')";
        return $this->runDML($query);
    }
    public function read()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
    public function checkCode()
    {
        $query = "SELECT * FROM `users` WHERE `user_name` = '$this->user_name' AND `code_email_verified` = $this->code_email_verified";
        return $this->runDQL($query);
    }
    public function updateStatus($status)
    {
        $query = "UPDATE `users` SET `status` = $status WHERE `user_name` = '$this->user_name'";
        return $this->runDML($query);
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
        $this->user_name = $user_name;

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
     * Get the value of frist_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of frist_name
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
     * Get the value of date_of_birth
     */
    public function getDate_of_birth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set the value of date_of_birth
     *
     * @return  self
     */
    public function setDate_of_birth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;

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
     * Get the value of create_at
     */
    public function getCreate_at()
    {
        return $this->create_at;
    }

    /**
     * Set the value of create_at
     *
     * @return  self
     */
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;

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

    /**
     * Get the value of verified_at
     */
    public function getVerified_at()
    {
        return $this->verified_at;
    }

    /**
     * Set the value of verified_at
     *
     * @return  self
     */
    public function setVerified_at($verified_at)
    {
        $this->verified_at = $verified_at;

        return $this;
    }

    /**
     * Get the value of sub_admin_id
     */
    public function getSub_admin_id()
    {
        return $this->sub_admin_id;
    }

    /**
     * Set the value of sub_admin_id
     *
     * @return  self
     */
    public function setSub_admin_id($sub_admin_id)
    {
        $this->sub_admin_id = $sub_admin_id;

        return $this;
    }



    /**
     * Get the value of code_email_verified
     */
    public function getCode_email_verified()
    {
        return $this->code_email_verified;
    }

    /**
     * Set the value of code_email_verified
     *
     * @return  self
     */
    public function setCode_email_verified($code_email_verified)
    {
        $this->code_email_verified = $code_email_verified;

        return $this;
    }
}