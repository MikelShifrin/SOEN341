<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 19:15
 */

namespace App\Http\Controllers;


use App\Catalog\UserCatalog;
use App\Catalog\ElectronicCatalog;

use Illuminate\Http\Request;
use Illuminate\Session\Store;


class EshopController extends Controller
{
    private $user_catalog;
    private $electronic_catalog;
    public function __construct() {
       $user_catalog = new UserCatalog();
       $electronic_catalog = new ElectronicCatalog();
        $this->setUserCatalog($user_catalog);
        $this->setElectronicCatalog($electronic_catalog);
    }

   /* /**
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

    /* /**
     * @return mixed
     */
    public function getElectronicCatalog()
    {
       return $this->electronic_catalog;
    }

    /**
     * @param mixed $user_catalog
     */
    public function setElectronicCatalog($electronic_catalog)
    {
       $this->electronic_catalog = $electronic_catalog;
    }



    public function login(Store $session, Request $request) {

        $username = $request->input('email');
        $password = $request->input('password');


    $this->getUserCatalog()->authenticate($username,$password);


      
  

    

       $login = $this->getUserCatalog()->authenticate($username,$password);
//        echo $login;
        if($login){
            return view( 'welcome');
        } else {
            $return = "Invalid Credentials!";
            return view('login', ['return'=>$return]);
        }

    }
public function addElectronicItem(Store $session, Request $request) {

        $brandName   = $request->input('brandName');
        $modelNumber = $request->input('modelNumber');
        $price       = $request->input('price');
        $weight      = $request->input('weight');
        $displaySize = $request->input('displaySize');
        $type        = $request->input('type');

        

        $brandName=$this->getElectronicCatalog()->additem($request);



        return $brandName;
    }

}

?>