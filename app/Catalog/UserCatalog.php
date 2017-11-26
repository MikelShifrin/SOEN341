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
    public function createUser($userresultset)
    {
        $row = $userresultset;
        while ($row) {
//        while($row = pg_fetch_array($userresultset)){

            $user=new user();
            $user->setUserId($row['user_id']);
            //$user->setEmailId($row['EMAIL_ID']);
//            $user->setPassword($row['PASSWORD']);
//            $user->setFirstName($row['FIRST_NAME']);
//            $user->setLastName($row['LAST_NAME']);
//            $user->setUserType($row['USER_TYPE']);
//            $user->setPhysicalAddressLine1($row['physical_address_line1']);
//            $user->setPhysicalAddressLine2($row['physical_address_line2']);
//            $user->setPhoneNumber($row['phone_number']);
        }
        return $user;
    }



    public function authenticate($username, $password,$user_type) {

       $login = $this->getUserTDG()->checkAuthentication($username, $password,$user_type);

       if($login==false){
           return $login;
       } else {
//           Session::put('user', $login);
//           $_SESSION['user'] = $login;
           $this->setUser($login);
           return $login;
        }

    }

    public function createNewUser($username,$password,$firstName,$lastName,$addressLineOne,$addressLineTwo,$telephone) {

        $this->getUser()->setEmailId($username);
        $this->getUser()->setPassword($password);
        $this->getUser()->setFirstName($firstName);
        $this->getUser()->setLastName($lastName);
        $this->getUser()->setPhysicalAddressLine1($addressLineOne);
        $this->getUser()->setPhysicalAddressLine2($addressLineTwo);
        $this->getUser()->setPhoneNumber($telephone);
        $this->getUser()->setUserType("user");

        return $this->getUser();

    }
}

?>