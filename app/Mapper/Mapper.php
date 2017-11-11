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
        $this->unitOfWork = new UnitOfWork();
        $this->clientCatalog = new ClientLogCatalog();
        $this->electronicCatalog = new ElectronicCatalog();
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

    public function createDesktop(){}
    public function createLaptop(){}
    public function createMonitor(){}
    public function createTablet(){}

    public function findDesktop(int $electronicsId)
    {

        $_SESSION['singletonMap']->getDesktopArray();

        $desktopArray = $_SESSION['singletonMap']->getDesktopArray();
        $desktop = $desktopArray[$electronicsId];
        print_r($desktop);

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
        $laptopArray = $this->identityMap->getAllLaptop();                                 //Message to idmap to get all laptops

        if($laptopArray == null)
        {
            $laptopArray = $this->electronicsTDG->viewInventory(3);                   //Fetch from DB
            $laptopArray = $this->electronicCatalog->createLaptopArray($laptopArray);    //create objects through catalog
            foreach ($laptopArray as $key => $laptop) {
                $this->getIdentityMap()->addLaptop($laptop);                              //Add object back to idmap
            }

        }
        return $laptopArray;
    }
    public function findAllMonitor()
    {
        $monitorArray = array();
        $monitorArray = $this->identityMap->getAllMonitor();                                 //Message to idmap to get all monitor

        if($monitorArray == null)
        {
            $monitorArray = $this->electronicsTDG->viewInventory(2);                   //Fetch from DB
            $monitorArray = $this->electronicCatalog->createMonitorArray($monitorArray);    //create objects through catalog
            foreach ($monitorArray as $key => $monitor) {
                $this->getIdentityMap()->addMonitor($monitor);                              //Add object back to idmap
            }

        }
        return $monitorArray;
    }
    public function findAllTablet()
    {
        $tabletArray = array();
        $tabletArray = $this->identityMap->getAllTablet();                                 //Message to idmap to get all tablets

        if($tabletArray  == null)
        {
            $tabletArray  = $this->electronicsTDG->viewInventory(4);                   //Fetch from DB
            $tabletArray  = $this->electronicCatalog->createTabletArray($tabletArray);    //create objects through catalog
            foreach ($tabletArray  as $key => $tablet) {
                $this->getIdentityMap()->addTablet($tablet);                              //Add object back to idmap
            }

        }
        return $tabletArray ;
    }

    public function modifyDesktop($desktop , $type, $request){

        $desktop = $this->getElectronicCatalog()->modifyInventory($desktop, $type, $request);
        return $desktop;

    }
    public function modifyLaptop(){}
    public function modifyMonitor(){}
    public function modifyTablet(){}

    public function addDesktop($desktop){

        $electronicsId = $desktop->getElectronicsId();
        $desktopArray = $_SESSION['singletonMap']->getDesktopArray();
        $desktopArray[$electronicsId] = $desktop;
        $_SESSION['singletonMap']->setDesktopArray($desktopArray);

    }




    public function deleteDesktop(){}
    public function deleteLaptop(){}
    public function deleteMonitor(){}
    public function deleteTablet(){}
}
