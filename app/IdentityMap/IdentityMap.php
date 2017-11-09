<?php

namespace App\IdentityMap;

use App\Model\Desktop;
use App\Model\Laptop;
use App\Model\Monitor;
use App\Model\Tablet;

class IdentityMap
{
    private $desktopArray = [];
    private $laptopArray = [];
    private $monitorArray = [];
    private $tabletArray = [];

    public function __construct()
    {}

    public function getDesktop(int $electronicsId)
    {
        return $this->desktopArray[$electronicsId];
    }

    public function getLaptop(int $electronicsId)
    {
        return $this->laptopArray[$$electronicsId];
    }

    public function getMonitor(int $electronicsId)
    {
        return $this->monitorArray[$electronicsId];
    }

    public function getTablet(int $electronicsId)
    {
        return $this->desktopArray[$electronicsId];
    }
    public function getAllDestop()
    {
        return $this->desktopArray;
    }

    public function getAllLaptop()
    {
        return $this->laptopArray;
    }

    public function getAllMonitor()
    {
        return $this->monitorArray;
    }

    public function getAllTablet()
    {
        return $this->tabletArray;
    }

    public function addDesktop(Desktop $desktop)
    {
        $this->desktopArray = array($desktop->getElectronicsId()=>$desktop);
    }

    public function addLaptop(Laptop $laptop)
    {
        $this->laptopArray = array($laptop->getElectronicsId()=>$laptop);
    }

    public function addMonitor(Monitor $monitor)
    {
        $this->monitorArray = array($monitor->getElectronicsId()=>$monitor);
    }

    public function addTablet(Tablet $tablet)
    {
        $this->tabletArray = array($tablet->getElectronicsId()=>$tablet);
    }

    public function deleteDesktop(int $electronicsId)
    {
        unset($this->desktopArray[$electronicsId]);
    }
    public function deleteLaptop(int $electronicsId)
    {
        unset($this->laptoppArray[$electronicsId]);
    }
    public function deleteMonitor(int $electronicsId)
    {
        unset($this->monitorArray[$electronicsId]);
    }
    public function deleteTablet(int $electronicsId)
    {
        unset($this->tabletArray[$electronicsId]);
    }
}
