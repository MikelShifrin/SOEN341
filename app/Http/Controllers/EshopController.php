<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 19:15
 */

namespace App\Http\Controllers;

use App\IdentityMap\IdentityMap;
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

        $this->setMapper(Mapper::Instance());
        //$user_catalog = new UserCatalog();
        //$this->setUserCatalog($user_catalog);

        //$client_log_catalog = new ClientLogCatalog();
        //$this->setClientLogCatalog($client_log_catalog);

        //$electronic_catalog = new ElectronicCatalog();
        //$this->setElectronicCatalog($electronic_catalog);
    }

    /**
     * @return mixed
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param mixed $mapper
     */
    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
    }



    public function login(Store $session, Request $request) {


        $username = $request->input('email');
        $password = $request->input('password');
        $user_type = $request->input('asAdmin');
        if($user_type=="on") {
            $user_type = "admin";
        } else {
            $user_type = "user";
        }
        session_start();
        if((isset($_SESSION['user'])))
        {
            if(trim($_SESSION['email']) == trim($username)) {
                return view( 'loginWelcome');
            }
            $return = "Another Admin logged in!";
            return view('login', ['return'=>$return]);
        }


       $login = $this->getMapper()->getUserCatalog()->authenticate($username,$password,$user_type);
        if($login==false){
            $return = "Invalid Credentials!";
            return view('login', ['return'=>$return]);
        } else {
            $user_id = $login['user_id'];
//            session_start();


            $_SESSION['user'] = $login;
            $_SESSION['email'] = $login['email_id'];
            if($user_type=="admin") {
                $_SESSION['user_type'] = "admin";
                $_SESSION['loggedin'] = true;
                $_SESSION['ElectronicsIdAddInternalCounterInitial'] = 10000000;
                $_SESSION['ElectronicsIdAddInternalCounter'] = 10000000;

                return view( 'loginWelcome');
            } else {


                Mapper::Instance()->findAllWishList($_SESSION['email']);
                Mapper::Instance()->findAllDesktop();
                Mapper::Instance()->findAllMonitor();
                Mapper::Instance()->findAllLaptop();
                Mapper::Instance()->findAllTablet();

                $_SESSION['user_type'] = "user";
                $_SESSION['WishIdAddInternalCounterInitial'] = 10000000;
                $_SESSION['WishIdAddInternalCounter'] = 10000000;
                return view('welcomeUser');
            }
        }
    }

    public function registerUser(Store $session, Request $request) {

        $username       = $request->input('email');
        $password       = $request->input('password');
        $firstName      = $request->input('firstName');
        $lastName       = $request->input('lastName');
        $addressLineOne = $request->input('addressLineOne');
        $addressLineTwo = $request->input('addressLineTwo');
        $telephone      = $request->input('telephone');

        $user = $this->getMapper()->getUserCatalog()->createNewUser($username,$password,$firstName,$lastName,$addressLineOne,$addressLineTwo,$telephone);
        //print_r($user);
        $this->mapper->getUserTDG()->addNewUser($user);

        $return = "Please Login in!";
        return view('login', ['return'=>$return]);
    }

    public function logout()
    {
        session_start();

        if(isset($_SESSION['user_type'])) {
            if ($_SESSION['user_type'] == 'user') {
                Mapper::Instance()->commitWishList();
            }
        }

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


        //$brandName=
       // $ret = Mapper::Instance()->getElectronicCatalog()->additem($request);
        $ret = Mapper::Instance()->createElectronics($request); // pass the request to mapper for adding electronics
        $return="Deatils added successfully";
        return view( 'welcome',['return'=>$return]);
    }

    public function viewInventory($type,$st)
    {
        session_start();

        if(isset($_SESSION['singletonMap'])){
            $singletonIdMap = $_SESSION['singletonMap'];
//            echo spl_object_hash ($singletonIdMap);

        } else {
            $singletonIdMap = IdentityMap::Instance();
            $_SESSION['singletonMap'] = $singletonIdMap;
        }

//        $ret = $this->mapper->getElectronicCatalog()->viewInventory($type);
        if($type=='1')
        {
            $ret = Mapper::Instance()->findAllDesktop();                             //Message to Mapper to get all desktops
            if($_SESSION['user_type']=="admin") {
                return view( 'view.viewInventoryDesktop',['ret'=>$ret]);      //Return to view
            } else {

                return view('userViews.viewDesktop',['ret'=>$ret,'st'=>$st]);
            }

        }
        elseif ($type=='2')
        {
            $ret = $this->mapper->findAllMonitor();                             //Message to Mapper to get all monitors
            if($_SESSION['user_type']=="admin") {
                return view( 'view.viewInventoryMonitor',['ret'=>$ret]);      //Return to view
            } else {
                return view( 'userViews.viewMonitor',['ret'=>$ret,'st'=>$st]);      //Return to view
            }
        }
        elseif ($type=='3')
        {

            $ret = $this->mapper->findAllLaptop();                             //Message to Mapper to get all laptops
            if($_SESSION['user_type']=="admin") {
                return view('view.viewInventoryLaptop', ['ret' => $ret]);      //Return to view
            } else {
                return view( 'userViews.viewLaptop',['ret'=>$ret,'st'=>$st]);      //Return to view
            }
        }
        elseif($type=='4')
        {
            $ret = $this->mapper->findAllTablet();                             //Message to Mapper to get all tablets

            if($_SESSION['user_type']=="admin") {
                return view('view.viewInventoryTablet', ['ret' => $ret]);      //Return to view
            } else {
                return view( 'userViews.viewTablet',['ret'=>$ret,'st'=>$st]);      //Return to view
            }
        }
    }

    public function deleteViewInventory($type) {       
        session_start();

        $ret = $this->getMapper()->getElectronicCatalog()->deleteInventory($type);
        if($type=='1'){
            $ret = Mapper::Instance()->findAllDesktop();  
        return view( 'delete.deleteInventoryDesktop',['ret'=>$ret]);
        } elseif ($type=='2') {
            $ret = Mapper::Instance()->findAllMonitor();
            return view( 'delete.deleteInventoryMonitor',['ret'=>$ret]);
        } elseif ($type=='3') {
            $ret = Mapper::Instance()->findAllLaptop();
            return view( 'delete.deleteInventoryLaptop',['ret'=>$ret]);
        } elseif($type=='4') {
            $ret = Mapper::Instance()->findAllTablet();
            return view( 'delete.deleteInventoryTablet',['ret'=>$ret]);
        } 

    }
    
    /*
    delete function gets it's parameters from deleteInventoryDesktop.blade.php view
    it is redirected here through a post request in web.php
    */
    public function deleteElectronicItem(Store $session, Request $request)
    {
        session_start();

        $ret = Mapper::Instance()->deleteElectronicItem($request);
        $return="Item Deleted Successfully";
        return view( 'welcome',['return'=>$return]);
    }


    public function modifyInventory($type) {
        session_start();

//        $ret = $this->mapper->getElectronicCatalog()->deleteInventory($type);
        if($type=='1'){
//            echo spl_object_hash ( IdentityMap::Instance());
            $ret = Mapper::Instance()->findAllDesktop();                             //Message to Mapper to get all desktops
            return view( 'modify.modifyInventoryDesktop',['ret'=>$ret]);      //Return to view
        } elseif ($type=='2') {
            $ret = Mapper::Instance()->findAllMonitor();
            return view( 'modify.modifyInventoryMonitor',['ret'=>$ret]);
        } elseif ($type=='3') {
            $ret = Mapper::Instance()->findAllLaptop();
            return view( 'modify.modifyInventoryLaptop',['ret'=>$ret]);
        } elseif($type=='4') {
            $ret = Mapper::Instance()->findAllTablet();
            return view( 'modify.modifyInventoryTablet',['ret'=>$ret]);
        }
    }

    public function modifyElectronics(Request $request,$type) {
        session_start();
        if($type=='1'){
//            echo spl_object_hash (IdentityMap::Instance());
            $desktop = $this->mapper->modifyElectronics($request,$type);                      //
            $return="Desktop Updated Successfully";
            return view( 'welcome',['return'=>$return]);
        }
         elseif($type=='2'){

             $monitor = $this->mapper->modifyElectronics($request,$type);                      //
             $return="Monitor Updated Successfully";
             return view( 'welcome',['return'=>$return]);
        }
        elseif($type=='3'){
            $laptop = $this->mapper->modifyElectronics($request,$type);                      //
            $return="Laptop Updated Successfully";
            return view( 'welcome',['return'=>$return]);
        }
        elseif($type=='4'){
            $tablet = $this->mapper->modifyElectronics($request,$type);                      //
            $return="Tablet Updated Successfully";
            return view( 'welcome',['return'=>$return]);
        }
    }

    public function commit() {
        session_start();

        $this->mapper->commit();

        return view('loginWelcome');



    }

    public function userShopDetail($type, $id)
    {

        session_start();


        $wishArray = $_SESSION['singletonMap']->getWishArray();
        $flag = false;
        foreach ($wishArray as $wish) {

            $es = $wish->getElectronics();
            if($id == $es->getElectronicsId()) {
                $flag = true;
            }

        }

        if ($type == 1) {

            $itemArray = $_SESSION['singletonMap']->getDesktopArray();
            $item = $itemArray[$id];
            if($flag) {
                return view('userViews.viewDesktopShopDetail', ['item' => $item,'Success' => "Set"]);
            } else {
                return view('userViews.viewDesktopShopDetail', ['item' => $item]);
            }

        } elseif ($type == 2) {

            $itemArray = $_SESSION['singletonMap']->getMonitorArray();
            $item = $itemArray[$id];
            if($flag) {
            return view('userViews.viewMonitorShopDetail', ['item' => $item,'Success' => "Set"]);
            } else {
                return view('userViews.viewMonitorShopDetail', ['item' => $item]);
            }

        } elseif ($type == 3) {

            $itemArray = $_SESSION['singletonMap']->getLaptopArray();
            $item = $itemArray[$id];
            if($flag) {
                return view('userViews.viewLaptopShopDetail', ['item' => $item, 'Success' => "Set"]);
            } else {
                return view('userViews.viewLaptopShopDetail', ['item' => $item]);
            }

        } else {

            $itemArray = $_SESSION['singletonMap']->getTabletArray();
            $item = $itemArray[$id];
            if($flag) {
                return view('userViews.viewTabletShopDetail', ['item' => $item, 'Success' => "Set"]);
            } else {
                return view('userViews.viewTabletShopDetail', ['item' => $item]);
            }

        }
    }

    public function filterDesktop(Request $request)
    {

        session_start();
        $itemArray = $_SESSION['singletonMap']->getDesktopArray();
        $filteredItems = [];

        foreach ($itemArray as $item) {
            $filterFlag = Array();

            $filterFlag['price'] = true;
            $filterFlag['ram'] = true;

            if (!is_null($request->input('brand'))) {
                $filterFlag['brand'] = false;
                foreach ($request->input('brand') as $value) {
                    if($item->getBrandName() == $value) {
                        $filterFlag['brand'] = true;
                    } else {
                        $filterFlag['brand'] = false;
                    }

                }
            }

            if (!is_null($request->input('price'))) {
              $range = explode("-", $request->input('price'));
                if(trim($item->getPrice())>=trim($range[0])&&trim($item->getPrice())<=trim($range[1])) {
                    $filterFlag['price'] = true;
                } else {
                    $filterFlag['price'] = false;
                }

            }

            if (!is_null($request->input('processor'))) {
                $filterFlag['processor'] = false;
                foreach ($request->input('processor') as $value) {
                    if(trim($item->getProcessorType()) == trim($value)) {
                        $filterFlag['processor'] = true;
                    } else $filterFlag['processor'] = false;
                }
            }

            if (!is_null($request->input('ram'))) {
                $range = explode("-", $request->input('ram'));
                if(trim($item->getRamSize())>=trim($range[0])&&trim($item->getRamSize())<=trim($range[1])) {
                    $filterFlag['ram'] = true;
                } else {
                    $filterFlag['ram'] = false;
                }
            }

            if (!is_null($request->input('hds'))) {
                $filterFlag['hds'] = false;
                foreach ($request->input('hds') as $value) {
                    if($item->getHardDiskSize() == $value) {
                        $filterFlag['hds'] = true;
                    } else {
                        $filterFlag['hds'] = false;
                    }

                }
            }

            $falseCnt = 0;

            foreach($filterFlag as $value) {
                if($value==false) {
                    $falseCnt++;
                }
            }
            if($falseCnt==0) {
                $filteredItems[$item->getElectronicsId()] = $item;
            }

        }

//        $filteredItems = array_values(array_unique($filteredItems));
        return view('userViews.viewDesktop',['ret'=>$filteredItems,'st'=>'default']);
//
//        return view('welcomeUser');

    }


    public function filterMonitor(Request $request)
    {

        session_start();
        $itemArray = $_SESSION['singletonMap']->getMonitorArray();
        $filteredItems = [];

        foreach ($itemArray as $item) {
            $filterFlag = Array();

            $filterFlag['price'] = true;
            $filterFlag['display'] = true;
            $filterFlag['weight'] = true;

            if (!is_null($request->input('brand'))) {
                $filterFlag['brand'] = false;
                foreach ($request->input('brand') as $value) {
                    if($item->getBrandName() == $value) {
                        $filterFlag['brand'] = true;
                    } else {
                        $filterFlag['brand'] = false;
                    }

                }
            }

            if (!is_null($request->input('price'))) {
                $range = explode("-", $request->input('price'));
                if(trim($item->getPrice())>=trim($range[0])&&trim($item->getPrice())<=trim($range[1])) {
                    $filterFlag['price'] = true;
                } else {
                    $filterFlag['price'] = false;
                }
            }

            if (!is_null($request->input('display'))) {
                $range = explode("-", $request->input('display'));
                if(trim($item->getSize())>=trim($range[0])&&trim($item->getSize())<=trim($range[1])) {
                    $filterFlag['display'] = true;
                } else {
                    $filterFlag['display'] = false;
                }
            }

            if (!is_null($request->input('weight'))) {
                $range = explode("-", $request->input('weight'));
                if(trim($item->getWeight())>=trim($range[0])&&trim($item->getWeight())<=trim($range[1])) {
                    $filterFlag['weight'] = true;
                } else {
                    $filterFlag['weight'] = false;
                }
            }

            $falseCnt = 0;

            foreach($filterFlag as $value) {
                if($value==false) {
                    $falseCnt++;
                }
            }
            if($falseCnt==0) {
                $filteredItems[$item->getElectronicsId()] = $item;
            }

        }
      return view('userViews.viewMonitor',['ret'=>$filteredItems,'st'=>'default']);
    }

    public function filterLaptop(Request $request)
    {

        session_start();
        $itemArray = $_SESSION['singletonMap']->getLaptopArray();
        $filteredItems = [];
//
        foreach ($itemArray as $item) {
            $filterFlag = Array();
            $filterFlag['price'] = true;
            $filterFlag['display'] = true;
            $filterFlag['weight'] = true;
            $filterFlag['battery'] = true;
//
            if (!is_null($request->input('brand'))) {
                $filterFlag['brand'] = false;
                foreach ($request->input('brand') as $value) {
                    if($item->getBrandName() == $value) {
                        $filterFlag['brand'] = true;
                    } else {
                        $filterFlag['brand'] = false;
                    }

                }
            }

            if (!is_null($request->input('processor'))) {
                $filterFlag['processor'] = false;
                foreach ($request->input('processor') as $value) {
                    if(trim($item->getProcessorType()) == trim($value)) {
                        $filterFlag['processor'] = true;
                    } else {
                        $filterFlag['processor'] = false;
                    }
                }
            }

            if (!is_null($request->input('hds'))) {
                $filterFlag['hds'] = false;
                foreach ($request->input('hds') as $value) {
                    if($item->getHardDiskSize() == $value) {
                        $filterFlag['hds'] = true;
                    } else {
                        $filterFlag['hds'] = false;
                    }

                }
            }

            if (!is_null($request->input('os'))) {
                $filterFlag['os'] = false;
                foreach ($request->input('os') as $value) {
                    if(trim($item->getOperatingSystem()) == trim($value)) {
                        $filterFlag['os'] = true;
                    } else {
                        $filterFlag['os'] = false;
                    }

                }
            }
//
            if (!is_null($request->input('price'))) {
                $range = explode("-", $request->input('price'));
                if(trim($item->getPrice())>=trim($range[0])&&trim($item->getPrice())<=trim($range[1])) {
                    $filterFlag['price'] = true;
                } else {
                    $filterFlag['price'] = false;
                }
            }

            if (!is_null($request->input('battery'))) {
                $range = explode("-", $request->input('battery'));
                if(trim($item->getBatteryInfo())>=trim($range[0])&&trim($item->getBatteryInfo())<=trim($range[1])) {
                    $filterFlag['battery'] = true;
                } else {
                    $filterFlag['battery'] = false;
                }
            }
//
            if (!is_null($request->input('display'))) {
                $range = explode("-", $request->input('display'));
                if(trim($item->getDisplaySize())>=trim($range[0])&&trim($item->getDisplaySize())<=trim($range[1])) {
                    $filterFlag['display'] = true;
                } else {
                    $filterFlag['display'] = false;
                }
            }
//
            if (!is_null($request->input('weight'))) {
                $range = explode("-", $request->input('weight'));
                if(trim($item->getWeight())>=trim($range[0])&&trim($item->getWeight())<=trim($range[1])) {
                    $filterFlag['weight'] = true;
                } else {
                    $filterFlag['weight'] = false;
                }
            }

            $falseCnt = 0;
            foreach($filterFlag as $value) {
                if($value==false) {
                    $falseCnt++;
                }
            }
            if($falseCnt==0) {
                $filteredItems[$item->getElectronicsId()] = $item;
            }
//
        }
        return view('userViews.viewLaptop',['ret'=>$filteredItems,'st'=>'default']);
    }



    public function filterTablet(Request $request)
    {

        session_start();
        $itemArray = $_SESSION['singletonMap']->getTabletArray();
        $filteredItems = [];
//
        foreach ($itemArray as $item) {
            $filterFlag = Array();
            $filterFlag['price'] = true;
            $filterFlag['display'] = true;
            $filterFlag['weight'] = true;
            $filterFlag['battery'] = true;
//
            if (!is_null($request->input('brand'))) {
                $filterFlag['brand'] = false;
                foreach ($request->input('brand') as $value) {
                    if($item->getBrandName() == $value) {
                        $filterFlag['brand'] = true;
                    } else {
                        $filterFlag['brand'] = false;
                    }

                }
            }

            if (!is_null($request->input('processor'))) {
                $filterFlag['processor'] = false;
                foreach ($request->input('processor') as $value) {
                    if(trim($item->getProcessorType()) == trim($value)) {
                        $filterFlag['processor'] = true;
                    } else {
                        $filterFlag['processor'] = false;
                    }

                }
            }

            if (!is_null($request->input('hds'))) {
                $filterFlag['hds'] = false;
                foreach ($request->input('hds') as $value) {
                    if($item->getHardDiskSize() == $value) {
                        $filterFlag['hds'] = true;
                    } else {
                        $filterFlag['hds'] = false;
                    }

                }
            }

            if (!is_null($request->input('os'))) {
                $filterFlag['os'] = false;
                foreach ($request->input('os') as $value) {
                    if(trim($item->getOperatingSystem()) == trim($value)) {
                        $filterFlag['os'] = true;
                    } else {
                        $filterFlag['os'] = false;
                    }

                }
            }

            if (!is_null($request->input('camera'))) {
                $filterFlag['camera'] = false;
                foreach ($request->input('camera') as $value) {
                    if($item->getCameraInfo() == $value) {
                        $filterFlag['camera'] = true;
                    } else {
                        $filterFlag['camera'] = false;
                    }

                }
            }
//
            if (!is_null($request->input('price'))) {
                $range = explode("-", $request->input('price'));
                if(trim($item->getPrice())>=trim($range[0])&&trim($item->getPrice())<=trim($range[1])) {
                    $filterFlag['price'] = true;
                } else {
                    $filterFlag['price'] = false;
                }
            }

            if (!is_null($request->input('battery'))) {
                $range = explode("-", $request->input('battery'));
                if(trim($item->getBatteryInfo())>=trim($range[0])&&trim($item->getBatteryInfo())<=trim($range[1])) {
                    $filterFlag['battery'] = true;
                } else {
                    $filterFlag['battery'] = false;
                }
            }
//
            if (!is_null($request->input('display'))) {
                $range = explode("-", $request->input('display'));
                if(trim($item->getDisplaySize())>=trim($range[0])&&trim($item->getDisplaySize())<=trim($range[1])) {
                    $filterFlag['display'] = true;
                } else {
                    $filterFlag['display'] = false;
                }
            }
//
            if (!is_null($request->input('weight'))) {
                $range = explode("-", $request->input('weight'));
                if(trim($item->getWeight())>=trim($range[0])&&trim($item->getWeight())<=trim($range[1])) {
                    $filterFlag['weight'] = true;
                } else {
                    $filterFlag['weight'] = false;
                }
            }

            $falseCnt = 0;
            foreach($filterFlag as $value) {
                if($value==false) {
                    $falseCnt++;
                }
            }
            if($falseCnt==0) {
                $filteredItems[$item->getElectronicsId()] = $item;
            }
//
        }
        return view('userViews.viewTablet',['ret'=>$filteredItems,'st'=>'default']);

    }

    public function addtoWishList($type,$electronicsId)
    {
        session_start();


        $item = Mapper::Instance()->AddtoWishList($type,$electronicsId);
        $Success="Added succesfully to wishlist";
//        return view('welcomeUser');
        if($type==1) {
            return view('userViews.viewDesktopShopDetail', ['item' => $item, 'Success' => $Success]);
        }
        if($type==2) {
            return view('userViews.viewMonitorShopDetail', ['item' => $item, 'Success' => $Success]);
        }
        if($type==3) {
            return view('userViews.viewLaptopShopDetail', ['item' => $item, 'Success' => $Success]);
        }
        if($type==4) {
            return view('userViews.viewTabletShopDetail', ['item' => $item, 'Success' => $Success]);
        }
    }


    public function viewWishList() {

        session_start();
        $email = $_SESSION['email'];

        $ret = Mapper::Instance()->getAllWishList();

//        print_r($ret);
        return view ('userViews.viewWishList',['ret' => $ret]);
    }

    }



?>
