<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 19:15
 */

namespace App\Http\Controllers;


use App\Catalog\ClientLogCatalog;
use App\Catalog\UserCatalog;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Session;


class EshopController extends Controller
{
    private $user_catalog;
    private $client_log_catalog;

    public function __construct() {
        $user_catalog = new UserCatalog();
        $client_log_catalog = new ClientLogCatalog();
        $this->setUserCatalog($user_catalog);
        $this->setClientLogCatalog($client_log_catalog);
    }

    /**
     * @return mixed
     */
    public function getClientLogCatalog()
    {
        return $this->client_log_catalog;
    }

    /**
     * @param mixed $client_log_catalog
     */
    public function setClientLogCatalog($client_log_catalog)
    {
        $this->client_log_catalog = $client_log_catalog;
    }

    /**
     * @return mixed
     */
    public function getUserCatalog()
    {
        return $this->user_catalog;
    }

    /**
     * @param mixed $user_catalog
     */
    public function setUserCatalog($user_catalog)
    {
        $this->user_catalog = $user_catalog;
    }



    public function login(Store $session, Request $request) {

        $username = $request->input('email');
        $password = $request->input('password');

       $login = $this->getUserCatalog()->authenticate($username,$password);
//        echo $login;
        if($login==false){
            $return = "Invalid Credentials!";
            return view('login', ['return'=>$return]);

        } else {

//            print_r($login);
            $user_id = $login['user_id'];
//            echo "$user_id";
            $this->getClientLogCatalog()->logActivity($user_id);
            return view( 'welcome');
        }

    }

}

?>