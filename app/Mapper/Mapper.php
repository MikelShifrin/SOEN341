<?php

namespace App\Mapper;

use App\IdentityMap\IdentityMap;
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

    public function __construct()
    {
        $identityMap = new IdentityMap();
        $this->setIdentityMap($identityMap);
        $this->unitOfWork = new UnitOfWork();
        $this->clientCatalog = new ClientLogCatalog();
        $this->electronicCatalog = new ElectronicCatalog();
        $this->userCatalog = new UserCatalog();
        $this->clientLogTDG = new ClientLogTDG();
        $this->electronicsTDG = new ElectronicsTDG();
        $this->userTDG = new UserTDG();
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

        $desktopArray = $this->getIdentityMap()->getAllDesktop();
        if($this->getIdentityMap() == null) {
            print "idmap null";
        }
        print_r($desktopArray);

        $desktop = $this->getIdentityMap()->getDesktop($electronicsId);

        if($desktop == null)
        {
            $electronicsTDG = new ElectronicsTDG();
            $ret = $electronicsTDG->retrieveDesktop();
            $desktop = new Desktop($ret['desktop_id'],$ret['length'],$ret['height'],$ret['width'],$ret['processor_type'],$ret['ram_size'],$ret['number_of_cpu_cores'],$ret['hard_disk_size'],$ret['electronicsid'],$ret['brand'],$ret['model_number'],$ret['price'],$ret['weight'],$ret['type']);
            $this->identityMap->addDesktop($desktop);
        }
        else
        {
            return $desktop;
        }
        return $desktop;
    }

    public function findLaptop(int $electronicsId){}
    public function findMonitor(int $electronicsId){}
    public function findTablet(int $electronicsId){}

    public function findAllDesktop()
    {
        $desktopArray = array();
        $desktopArray = $this->getIdentityMap()->getAllDesktop();                                 //Message to idmap to get all desktops

        if($desktopArray == null)
        {
            $desktopArray = $this->electronicsTDG->viewInventory(1);                   //Fetch from DB
            $desktopArray = $this->electronicCatalog->createDesktopArray($desktopArray);    //create objects through catalog


            $this->getIdentityMap()->setDesktopArray($desktopArray);                             //add array to idmap

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

    public function modifyDesktop(){}
    public function modifyLaptop(){}
    public function modifyMonitor(){}
    public function modifyTablet(){}            

    public function deleteDesktop(){}
    public function deleteLaptop(){}
    public function deleteMonitor(){}
    public function deleteTablet(){}
}
