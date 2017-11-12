<?php

namespace App\Mapper;

use App\IdentityMap\IdentityMap;
use App\Model\Monitor;
use App\UnitOfWork\UnitOfWork;
use App\Catalog\ClientLogCatalog;
use App\Catalog\ElectronicCatalog;
use App\Catalog\UserCatalog;
use App\TDG\ClientLogTDG;
use App\TDG\ElectronicsTDG;
use App\TDG\UserTDG;

class Mapper
{
    private $identityMap;
    private $unitOfWork;
    private $clientCatalog;
    private $electronicCatalog;
    private $userCatalog;
    private $clientLogTDG;
    private $electronicsTDG;
    private $userTDG;
    private static $inst = null;

    public static function Instance()
    {
        if (Self::$inst === null) {
            Self::$inst = new Mapper();
        }
        return Self::$inst;
    }

    private function __construct()
    {
        $this->clientCatalog = new ClientLogCatalog();
        $this->setElectronicCatalog(new ElectronicCatalog());
        $this->userCatalog = new UserCatalog();
        $this->clientLogTDG = new ClientLogTDG();
        $this->electronicsTDG = new ElectronicsTDG();
        $this->userTDG = new UserTDG();
    }

    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

    //all mutators (setters)
    public function setIdentityMap($identityMap)
    {
        $this->identityMap = $identityMap;
    }
    public function setUnitOfWork($unitOfWork)
    {
        $this->unitOfWork = $unitOfWork;
    }
    public function setClientCatalog($clientCatalog)
    {
        $this->clientCatalog = $clientCatalog;
    }
    public function setElectronicCatalog($electronicCatalog)
    {
        $this->electronicCatalog = $electronicCatalog;
    }
    public function setUserCatalog($userCatalog)
    {
        $this->userCatalog = $userCatalog;
    }
    public function setClientLogTDG($clientLogTDG)
    {
        $this->clientLogTDG = $clientLogTDG;
    }
    public function setElectronicsTDG($electronicsTDG)
    {
        $this->electronicsTDG = $electronicsTDG;
    }
    public function setUserTDG($userTDG)
    {
        $this->userTDG = $userTDG;
    }

    //all accessors (getters)
    public function getIdentityMap()
    {
        return $this->identityMap;
    }
    public function getUnitOfWork()
    {
        return $this->unitOfWork;
    }
    public function getClientCatalog()
    {
        return $this->clientCatalog;
    }
    public function getElectronicCatalog()
    {
        return $this->electronicCatalog;
    }
    public function getUserCatalog()
    {
        return $this->userCatalog;
    }
    public function getClientLogTDG()
    {
        return $this->clientLogTDG;
    }
    public function getElectronicsTDG()
    {
        return $this->electronicsTDG;
    }
    public function getUserTDG()
    {
        return $this->userTDG;
    }

    public function createElectronics($request){

        $item=$this->getElectronicCatalog()->additem($request);
        if ($request->input('type')=='d'){
            if(isset($_SESSION['singletonMap'])){
                $singletonIdMap = $_SESSION['singletonMap'];


            } else {
                $singletonIdMap = IdentityMap::Instance();

            }
            $singletonIdMap->addDesktop($item);
            $_SESSION['singletonMap'] = $singletonIdMap;
            if(isset($_SESSION['singletonUOW'])){
                $singletonUOW = $_SESSION['singletonUOW'];
                echo spl_object_hash ($singletonUOW);

            } else {
                $singletonUOW = UnitOfWork::Instance();

            }
            $singletonUOW->registerNew($item,1);// regiter desktop new
            $_SESSION['singletonUOW'] = $singletonUOW;
        }
        if ($request->input('type')=='t'){

        }
        if ($request->input('type')=='l'){

        }
        if ($request->input('type')=='m'){

        }
    }

    public function findElectronics($electronicsId, $type) {

        if($type==1) {
            $_SESSION['singletonMap']->getDesktopArray();
            $desktopArray = $_SESSION['singletonMap']->getDesktopArray();
           
            $desktop = $desktopArray[$electronicsId];

            if($desktop == null)
            {
               $electronicsTDG = new ElectronicsTDG();
                $ret = $electronicsTDG->retrieveDesktop();
                $desktop = new Desktop($ret['desktop_id'],$ret['length'],$ret['height'],$ret['width'],$ret['processor_type'],
                    $ret['ram_size'],$ret['number_of_cpu_cores'],$ret['hard_disk_size'],$ret['electronics_id'],$ret['brand'],
                    $ret['model_number'],$ret['price'],$ret['weight'],$ret['type']);
                $this->identityMap->addDesktop($desktop);
            }
            else
            {
                return $desktop;
            }
        } elseif ($type==2) {

            $_SESSION['singletonMap']->getMonitorArray();

            $monitorArray = $_SESSION['singletonMap']->getMonitorArray();
            $monitor = $monitorArray[$electronicsId];

            if($monitor == null)
            {
                $electronicsTDG = new ElectronicsTDG();
                $ret = $electronicsTDG->retrieveMonitor();
                $monitor = new Monitor();
                $monitor->setElectronicsId($ret['electronics_id']);
                $monitor->setElectronicsId($ret['brand']);
                $monitor->setElectronicsId($ret['model_number']);
                $monitor->setElectronicsId($ret['price']);
                $monitor->setElectronicsId($ret['display_size']);
                $monitor->setElectronicsId($ret['weight']);
                $monitor->setElectronicsId($ret['monitor_id']);

                $this->identityMap->addMonitor($monitor);
            }
            else
            {
                return $monitor;
            }

        }

    }


    public function findLaptop(int $electronicsId){}
    public function findMonitor(int $electronicsId){}
    public function findTablet(int $electronicsId){}

    public function findAllDesktop()
    {
        $desktopArray = array();
        if(isset($_SESSION['singletonMap'])){
            $desktopArray = $_SESSION['singletonMap']->getAllDesktop();
        }
        else {
            $desktopArray = IdentityMap::Instance()->getAllDesktop();                                 //Message to idmap to get all desktops
        }

        if($desktopArray == null)
        {
            $desktopArray = $this->electronicsTDG->viewInventory(1);                   //Fetch from DB
            $desktopArray = $this->electronicCatalog->createDesktopArray($desktopArray);    //create objects through catalog

            IdentityMap::Instance()->setDesktopArray($desktopArray);                             //add array to idmap
            $_SESSION['singletonMap'] = IdentityMap::Instance();
        }
        return $desktopArray;
    }
    public function findAllLaptop()
    {
        $laptopArray = array();
        if(isset($_SESSION['singletonMap'])){
            $laptopArray = $_SESSION['singletonMap']->getAllLaptop();
        }
        else {
            $laptopArray = IdentityMap::Instance()->getAllLaptop();                                 //Message to idmap to get all desktops
        }

        if($laptopArray == null)
        {
            $laptopArray = $this->electronicsTDG->viewInventory(3);                   //Fetch from DB
            $laptopArray = $this->electronicCatalog->createLaptopArray($laptopArray);    //create objects through catalog

            IdentityMap::Instance()->setLaptopArray($laptopArray);                             //add array to idmap
            $_SESSION['singletonMap'] = IdentityMap::Instance();
        }
        return $laptopArray;
    }
    public function findAllMonitor()
    {
        $monitorArray = array();
        if(isset($_SESSION['singletonMap'])){
            $monitorArray = $_SESSION['singletonMap']->getAllMonitor();
        }
        else {
            $monitorArray = IdentityMap::Instance()->getAllMonitor();                                 //Message to idmap to get all desktops
        }

        if($monitorArray == null)
        {
            $monitorArray = $this->electronicsTDG->viewInventory(2);                   //Fetch from DB
            $monitorArray = $this->electronicCatalog->createMonitorArray($monitorArray);    //create objects through catalog

            IdentityMap::Instance()->setMonitorArray($monitorArray);                             //add array to idmap
            $_SESSION['singletonMap'] = IdentityMap::Instance();
        }
        return $monitorArray;
    }
    public function findAllTablet()
    {
        $tabletArray = array();
        if(isset($_SESSION['singletonMap'])){
            $tabletArray = $_SESSION['singletonMap']->getAllTablet();
        }
        else {
            $tabletArray = IdentityMap::Instance()->getAllTablet();                                 //Message to idmap to get all desktops
        }

        if($tabletArray == null)
        {
            $tabletArray = $this->electronicsTDG->viewInventory(4);                   //Fetch from DB
            $tabletArray = $this->electronicCatalog->createTabletArray($tabletArray);    //create objects through catalog

            IdentityMap::Instance()->setTabletArray($tabletArray);                             //add array to idmap
            $_SESSION['singletonMap'] = IdentityMap::Instance();
        }
        return $tabletArray;
    }

    public function modifyElectronics($request,$type) {

        if($type==1) {

            $electronicsId = $request->input('hiddenElectronicsId');                                //get electronics id
            $desktop = $this->findElectronics($electronicsId, $type);                               //get existing desktop obj from idmap
            $desktop = $this->getElectronicCatalog()->modifyInventory($desktop, $type, $request);   //modify obj
            if(isset($_SESSION['singletonUOW'])){
                $singletonUOW = $_SESSION['singletonUOW'];
                echo spl_object_hash ($singletonUOW);

            } else {
                $singletonUOW = UnitOfWork::Instance();

            }
            if($desktop->getElectronicsId() < 100000){
                $singletonUOW->registerDirty($desktop,1);                              //register dirty with uow
            }
            $_SESSION['singletonUOW'] = $singletonUOW;
//          $this->mapper->getElectronicsTDG()->modifyDesktop($request);
            $_SESSION['singletonUOW'] = $singletonUOW;
            $electronicsId = $desktop->getElectronicsId();
            $desktopArray = $_SESSION['singletonMap']->getDesktopArray();
            $desktopArray[$electronicsId] = $desktop;
            $_SESSION['singletonMap']->setDesktopArray($desktopArray);

            return $desktop;
        }

        if($type==2) {

            $electronicsId = $request->input('hiddenElectronicsId');                                //get electronics id
            $monitor = $this->findElectronics($electronicsId, $type);                               //get existing monitor obj from idmap
            $monitor = $this->getElectronicCatalog()->modifyInventory($monitor, $type, $request);   //modify obj
            if(isset($_SESSION['singletonUOW'])){
                $singletonUOW = $_SESSION['singletonUOW'];
                echo spl_object_hash ($singletonUOW);

            } else {
                $singletonUOW = UnitOfWork::Instance();
                $_SESSION['singletonUOW'] = $singletonUOW;
            }

            $singletonUOW->registerDirty($monitor,2);                              //register dirty with uow
            $_SESSION['singletonUOW'] = $singletonUOW;
//          $this->mapper->getElectronicsTDG()->modifyDesktop($request);
            $electronicsId = $monitor->getElectronicsId();
            $monitorArray = $_SESSION['singletonMap']->getMonitorArray();
            $monitorArray[$electronicsId] = $monitor;
            $_SESSION['singletonMap']->setMonitorArray($monitorArray);

            return $monitor;
        }



    }

    public function modifyDesktop($desktop , $type, $request){

        return $desktop;

    }
    public function modifyLaptop(){}
    public function modifyMonitor(){}
    public function modifyTablet(){}

    public function addDesktop($desktop){



    }




    public function deleteDesktop(){}
    public function deleteLaptop(){}
    public function deleteMonitor(){}
    public function deleteTablet(){}



    public function commit() {

        $houseKeepingArray = $_SESSION['singletonUOW']->commit();




    }

}
