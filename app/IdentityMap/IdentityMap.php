<?php

namespace App\IdentityMap;

use App\Model\Desktop;
use App\Model\Laptop;
use App\Model\Monitor;
use App\Model\Tablet;

class IdentityMap
{
    private $desktopArray;
    private $laptopArray;
    private $monitorArray;
    private $tabletArray;

    public function findDestop(int $desktopId)
    {
        $desktop = $this->desktopArray[$desktopId];
        return $desktop;
    }

    public function findLaptop(int $laptopId)
    {
        return $this->laptopArray[$laptopId];
    }

    public function findMonitor(int $monitorId)
    {
        return $this->monitorArray[$monitorId];
    }

    public function findTablet(int $tabletId)
    {
        return $this->desktopArray[$tabletId];
    }

    public function addDesktop(Desktop $desktop)
    {
        $this->desktopArray = array($desktop->getDesktopId()=>$desktop);
        //$session->put('desktopArray', array($desktop->getDesktopId()=>$desktop));
    }

    public function addLaptop(Laptop $laptop)
    {
        $this->laptopArray = array($laptop->getDesktopId()=>$laptop);
        //$session->put('laptopArray', array($laptop->getDesktopId()=>$laptop));
    }

    public function addMonitor(Monitor $monitor)
    {
        $this->monitorArray = array($monitor->getDesktopId()=>$monitor);
        //$session->put('monitorArray', array($monitor->getDesktopId()=>$monitor));
    }

    public function addTablet(Tablet $tablet)
    {
        $this->tabletArray = array($tablet->getDesktopId()=>$tablet);
        //$session->put('tabletArray', array($tablet->getDesktopId()=>$tablet));
    }

    public function deleteDesktop(int $desktopId)
    {
        unset($this->desktopArray[$desktopId]);
    }
    public function deleteLaptop(int $laptopId)
    {
        unset($this->laptoppArray[$laptopId]);
    }
    public function deleteMonitor(int $monitorId)
    {
        unset($this->monitorArray[$monitorId]);
    }
    public function deleteTablet(int $tablet)
    {
        unset($this->tabletArray[$tabletId]);
    }
}
