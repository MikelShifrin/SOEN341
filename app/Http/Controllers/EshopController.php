<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 19:15
 */

namespace App\Http\Controllers;

use App\Mapper\Mapper;
use App\Catalog\ClientLogCatalog;
use App\Catalog\UserCatalog;
use App\Catalog\ElectronicCatalog;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Session;


class EshopController extends Controller
{
    //private $user_catalog;
    //private $client_log_catalog;
    //private $electronic_catalog;
    private $mapper;

    public function __construct() {
        $mapper = new Mapper();
        //$user_catalog = new UserCatalog();
        //$this->setUserCatalog($user_catalog);

        //$client_log_catalog = new ClientLogCatalog();
        //$this->setClientLogCatalog($client_log_catalog);

        //$electronic_catalog = new ElectronicCatalog();
        //$this->setElectronicCatalog($electronic_catalog);
    }

    public function setMapper($mapper)
    {
        $this->$mapper = $mapper;
    }

    public function getMapper()
    {
        return $this->$mapper;
    }

    public function login(Store $session, Request $request) {

        $username = $request->input('email');
        $password = $request->input('password');


       $login = $this->$mapper->getUserCatalog()->authenticate($username,$password);
        if($login==false){
            $return = "Invalid Credentials!";
            return view('login', ['return'=>$return]);
        } else {
            $user_id = $login['user_id'];

            session_start();
            $_SESSION['user'] = $login;
            $_SESSION['email'] = $login['email_id'];
            return view( 'welcome');
        }

    }

    public function logout()
    {
        session_start();
        session_destroy();

        return view( 'login');
    }

    public function addElectronicItem(Store $session, Request $request)
    {
        session_start();

        //$brandName   = $request->input('brandName');
        //$modelNumber = $request->input('modelNumber');
        //$price       = $request->input('price');
        //$weight      = $request->input('weight');
        //$displaySize = $request->input('displaySize');
        //$type        = $request->input('type');

        //$brandName=
        $this->$mapper->getElectronicCatalog()->additem($request);
        $return="Deatils added successfully";
        return view( 'welcome',['return'=>$return]);
    }

    public function viewInventory($type)
    {
        session_start();
        $ret = $this->$mapper->getElectronicCatalog()->viewInventory($type);
        if($type=='1')
        {
        return view( 'view.viewInventoryDesktop',['ret'=>$ret]);
        }
        elseif ($type=='2')
        {
            return view( 'view.viewInventoryMonitor',['ret'=>$ret]);
        }
        elseif ($type=='3')
        {
            return view( 'view.viewInventoryLaptop',['ret'=>$ret]);
        }
        elseif($type=='4')
        {
            return view( 'view.viewInventoryTablet',['ret'=>$ret]);
        }
    }

    public function deleteViewInventory($type) {
        session_start();
        $ret = $this->$mapper->getElectronicCatalog()->deleteInventory($type);
        if($type=='1'){
        return view( 'delete.deleteInventoryDesktop',['ret'=>$ret]);
        } elseif ($type=='2') {
            return view( 'delete.deleteInventoryMonitor',['ret'=>$ret]);
        } elseif ($type=='3') {
            return view( 'delete.deleteInventoryLaptop',['ret'=>$ret]);
        } elseif($type=='4') {
            return view( 'delete.deleteInventoryTablet',['ret'=>$ret]);
        }
    }

    /*
    delete function gets it's parameters from deleteInventoryDesktop.blade.php view
    it is redirected here through a post request in web.php
    */
    public function deleteElectronicItem(Store $session, Request $request) {
        session_start();

                $electronics_id = $request -> input('radio');
               // $type = $request -> input('type');

                $electronics_id = $this->getElectronicCatalog()->deleteitem($electronics_id);
                return view( 'welcome');
            }


        public function modifyInventory($type) {
            session_start();
            $ret = $this->getElectronicCatalog()->deleteInventory($type);
            if($type=='1'){
            return view( 'modify.modifyInventoryDesktop',['ret'=>$ret]);
            } elseif ($type=='2') {
                return view( 'modify.modifyInventoryMonitor',['ret'=>$ret]);
            } elseif ($type=='3') {
                return view( 'modify.modifyInventoryLaptop',['ret'=>$ret]);
            } elseif($type=='4') {
                return view( 'modify.modifyInventoryTablet',['ret'=>$ret]);
            }
        }

    }
?>
