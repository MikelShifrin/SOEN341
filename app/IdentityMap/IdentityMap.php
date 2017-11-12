<?php

namespace App\IdentityMap;

use App\Model\Desktop;
use App\Model\Laptop;
use App\Model\Monitor;
use App\Model\Tablet;

class IdentityMap
{
    private $desktopArray = array();
    private $laptopArray = [];
    private $monitorArray = [];
    private $tabletArray = [];
    private $testString;
    private static $inst;

    /**
     * @return mixed
     */
    public function getTestString()
    {
        return $this->testString;
    }

    /**
     * @param mixed $testString
     */
    public function setTestString($testString)
    {
        $this->testString = $testString;
    }



    public static function Instance()
    {
        Self::$inst === null;
        if (Self::$inst === null) {
            Self::$inst = new IdentityMap();
        }
        return Self::$inst;
    }

    /**
     * @param array $desktopArray
     */
    public function setDesktopArray(array $desktopArray)
    {
        $this->desktopArray = $desktopArray;

    }

    /**
     * @param array $laptopArray
     */
    public function setLaptopArray(array $laptopArray)
    {
        $this->laptopArray = $laptopArray;
    }

    /**
     * @param array $monitorArray
     */
    public function setMonitorArray(array $monitorArray)
    {
        $this->monitorArray = $monitorArray;
    }

    /**
     * @param array $tabletArray
     */
    public function setTabletArray(array $tabletArray)
    {
        $this->tabletArray = $tabletArray;
    }

    /**
     * @return array
     */
    public function getDesktopArray(): array
    {
        return $this->desktopArray;
    }

    /**
     * @return array
     */
    public function getLaptopArray(): array
    {
        return $this->laptopArray;
    }

    /**
     * @return array
     */
    public function getMonitorArray(): array
    {
        return $this->monitorArray;
    }

    /**
     * @return array
     */
    public function getTabletArray(): array
    {
        return $this->tabletArray;
    }


    private function __construct()
    {


    }




    public function getDesktop(int $electronicsId)
    {

//        $desktop = $this->desktopArray[$electronicsId];
//        print_r($this->desktopArray);

//        return $desktop;

        return $this->desktopArray[$electronicsId];

    }

    public function getLaptop(int $electronicsId)
    {
        return $this->laptopArray[$electronicsId];
    }

    public function getMonitor(int $electronicsId)
    {
        return $this->monitorArray[$electronicsId];
    }

    public function getTablet(int $electronicsId)
    {
        return $this->desktopArray[$electronicsId];
    }
    public function getAllDesktop()
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

//        $this->desktopArray = array($desktop->getDesktopId()=>$desktop);
        $electronicsId = $desktop->getElectronicsId();


        $this->desktopArray[$electronicsId] = $desktop;
        //$session->put('desktopArray', array($desktop->getDesktopId()=>$desktop));

//        $this->desktopArray = array($desktop->getElectronicsId()=>$desktop);

    }

    public function addLaptop(Laptop $laptop)
    {

        $this->laptopArray = array($laptop->getLaptopId()=>$laptop);
        //$session->put('laptopArray', array($laptop->getDesktopId()=>$laptop));

        $this->laptopArray = array($laptop->getElectronicsId()=>$laptop);

    }

    public function addMonitor(Monitor $monitor)
    {

        $this->monitorArray = array($monitor->getMonitorId()=>$monitor);
        //$session->put('monitorArray', array($monitor->getDesktopId()=>$monitor));

        $this->monitorArray = array($monitor->getElectronicsId()=>$monitor);

    }

    public function addTablet(Tablet $tablet)
    {

        $this->tabletArray = array($tablet->getTabletId()=>$tablet);
        //$session->put('tabletArray', array($tablet->getDesktopId()=>$tablet));

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
