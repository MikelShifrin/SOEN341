<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 22:07
 */

namespace App\Catalog;

use App\TDG\UserTDG;
use Illuminate\Support\Facades\DB;
use Illuminate\Session;
use App\Model\User;

class UserCatalog
{
    private $user;
    private $userTDG;
    public function __construct() {
        $user = new User();
        $userTDG = new UserTDG();
        $this->setUser($user);
        $this->setUserTDG($userTDG);
    }

    /**
     * @return mixed
     */
    public function getUserTDG()
    {
        return $this->userTDG;
    }

    /**
     * @param mixed $userTDG
     */
    public function setUserTDG($userTDG)
    {
        $this->userTDG = $userTDG;
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




    public function authenticate($username, $password) {

       $login = $this->getUserTDG()->checkAuthentication($username, $password);

       if($login==false){
           return $login;
       } else {
//           Session::put('user', $login);
//           $_SESSION['user'] = $login;
           $this->setUser($login);
           return $login;
        }


    }
}