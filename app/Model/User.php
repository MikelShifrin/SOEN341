<?php
namespace App\Model;

class User
{
    private $userId;
    private $emailId;
    private $password;
    private $firstName;
    private $lastName;
    private $userType;
    private $physicalAddressLine1;
    private $physicalAddresskLine2;
    private $phoneNumber;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * @param mixed $email_id
     */
    public function setEmailId($emailId)
    {
        $this->emailId = $emailId;
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
        return $this->firstName;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param mixed $user_type
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * @return mixed
     */
    public function getPhysicalAddressLine1()
    {
        return $this->physicalAddressLine1;
    }

    /**
     * @param mixed $physical_address_line1
     */
    public function setPhysicalAddressLine1($physicalAddressLine1)
    {
        $this->physicalAddressLine1 = $physicalAddressLine1;
    }

    /**
     * @return mixed
     */
    public function getPhysicalAddressLine2()
    {
        return $this->physicalAddressLine2;
    }

    /**
     * @param mixed $physical_address_line2
     */
    public function setPhysicalAddressLine2($physicalAddressLine2)
    {
        $this->physicalAddressLine2 = $physicalAddressLine2;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}
