<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 22:07
 */

namespace App\Catalog;


use App\Model\User;

class UserCatalog
{
    private $users = Array();
    public function __construct() {
        $users = new User();
        $this->setUsers($users);
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }



    public function authenticate($username, $password) {

        $this->$users


    }
}