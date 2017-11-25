<?php
namespace App\Model;

class WishList
{
    private $wishId, $ElectronicsID, $ClientID;

    /**
     * @return mixed
     */
    public function getWishId()
    {
        return $this->wishId;
    }

    /**
     * @param mixed $wishId
     */
    public function setWishId($wishId)
    {
        $this->wishId = $wishId;
    }

    /**
     * @return mixed
     */
    public function getClientID()
    {
        return $this->ClientID;
    }

    /**
     * @param mixed $ClientID
     */
    public function setClientID($ClientID)
    {
        $this->ClientID = $ClientID;
    }

    /**
     * @return mixed
     */
    public function getElectronicsID()
    {
        return $this->ElectronicsID;
    }

    /**
     * @param mixed $ElectronicsID
     */
    public function setElectronicsID($ElectronicsID)
    {
        $this->ElectronicsID = $ElectronicsID;
    }
}
