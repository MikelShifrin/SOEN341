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
        $this->identityMap = new IdentityMap();
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
        $identityMap = new IdentityMap();

        $desktop = $identityMap->getDesktop($electronicsId);
        if($desktop == null)
        {
            $electronicsTDG = new ElectronicsTDG();
            $ret = $electronicsTDG->retrieveDesktop();

            $desktop = new Desktop($ret['desktop_id'],$ret['length']
            ,$ret['height'],$ret['width'],$ret['processor_type']
            ,$ret['ram_size'],$ret['number_of_cpu_cores'],$ret['hard_disk_size']
            ,$ret['electronicsid'],$ret['brand'],$ret['model_number']
            ,$ret['price'],$ret['weight'],$ret['type']);

            $identityMap->addDesktop($desktop);
        }
        return $desktop;
    }
    public function findLaptop(int $electronicsId){}
    public function findMonitor(int $electronicsId){}
    public function findTablet(int $electronicsId){}

    public function findAllDesktop()
    {
        $identityMap = new IdentityMap();
        $desktopArray = $identityMap->getAllDestop();

        if($desktopArray == null)
        {
            $electronicsTDG = new ElectronicsTDG();
            return $electronicsTDG->viewInventory(1);
        }
    }
    public function findAllLaptop()
    {
        $identityMap = new IdentityMap();
        $laptopArray = $identityMap->getAllLaptop();

        if($laptopArray == null)
        {
            $electronicsTDG = new ElectronicsTDG();
            return $electronicsTDG->viewInventory(2);
        }
    }
    public function findAllMonitor()
    {
        $identityMap = new IdentityMap();
        $monitorArray = $identityMap->getAllMonitor();

        if($monitorArray == null)
        {
            $electronicsTDG = new ElectronicsTDG();
            return $electronicsTDG->viewInventory(3);
        }
    }
    public function findAllTablet()
    {
        $identityMap = new IdentityMap();
        $tabletArray = $identityMap->getAllTablet();

        if($tabletArray == null)
        {
            $electronicsTDG = new ElectronicsTDG();
            return $electronicsTDG->viewInventory(4);
        }
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
