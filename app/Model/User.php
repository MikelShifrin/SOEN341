<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 21:25
 */

namespace App\Model;


class User
{
    private $user_id;
    private $email_id;
    private $password;
    private $first_name;
    private $last_name;
    private $user_type;
    private $physical_address_line1;
    private $physical_address_line2;
    private $phone_number;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getEmailId()
    {
        return $this->email_id;
    }

    /**
     * @param mixed $email_id
     */
    public function setEmailId($email_id)
    {
        $this->email_id = $email_id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return mixed
     */
    public function getPhysicalAddressLine1()
    {
        return $this->physical_address_line1;
    }

    /**
     * @param mixed $physical_address_line1
     */
    public function setPhysicalAddressLine1($physical_address_line1)
    {
        $this->physical_address_line1 = $physical_address_line1;
    }

    /**
     * @return mixed
     */
    public function getPhysicalAddressLine2()
    {
        return $this->physical_address_line2;
    }

    /**
     * @param mixed $physical_address_line2
     */
    public function setPhysicalAddressLine2($physical_address_line2)
    {
        $this->physical_address_line2 = $physical_address_line2;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

}