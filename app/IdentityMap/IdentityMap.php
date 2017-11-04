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

    public function findDestop(int $desktopId, $session)
    {
        //return $this->desktopArray[$desktopId];
    }

    public function findLaptop(int $laptopId, $session)
    {
        //return $this->laptopArray[$laptopId];
    }

    public function findMonitor(int $monitorId, $session)
    {
        //return $this->monitorArray[$monitorId];
    }

    public function findTablet(int $tabletId, $session)
    {
        return $this->desktopArray[$tabletId];
    }

    public function addDesktop(Desktop $desktop, $session)
    {
        $this->desktopArray = array($desktop->getDesktopId()=>$desktop);
        $session->put('desktopArray', array($desktop->getDesktopId()=>$desktop));
    }

    public function addLaptop(Laptop $laptop, $session)
    {
        $this->laptopArray = array($laptop->getDesktopId()=>$laptop);
        $session->put('laptopArray', array($laptop->getDesktopId()=>$laptop));
    }

    public function addMonitor(Monitor $monitor, $session)
    {
        $this->monitorArray = array($monitor->getDesktopId()=>$monitor);
        $session->put('monitorArray', array($monitor->getDesktopId()=>$monitor));
    }

    public function addTablet(Tablet $tablet)
    {
        $this->tabletArray = array($tablet->getDesktopId()=>$tablet);
        $session->put('tabletArray', array($tablet->getDesktopId()=>$tablet));
    }

    public function deleteDesktop(int $desktopId, $session)
    {
        unset($this->desktopArray[$desktopId]);
    }
    public function deleteLaptop(int $laptopId, $session)
    {
        unset($this->laptoppArray[$laptopId]);
    }
    public function deleteMonitor(int $monitorId, $session)
    {
        unset($this->monitorArray[$monitorId]);
    }
    public function deleteTablet(int $tablet, $session)
    {
        unset($this->tabletArray[$tabletId]);
    }
}
