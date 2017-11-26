<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 11/16/2017
 * Time: 8:04 PM
 */

namespace App\Model;


class WishList
{
    private $wishId, $Electronics, $user;

    /**
     * @return mixed
     */
    public function getElectronics()
    {
        return $this->Electronics;
    }

    /**
     * @param mixed $Electronics
     */
    public function setElectronics($Electronics)
    {
        $this->Electronics = $Electronics;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

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


}