<?php

namespace App\UnitOfWork;

use App\Model\Desktop;
use App\Model\ElectronicSpecification;
use App\Model\Laptop;
use App\Model\Monitor;
use App\Model\Tablet;

class UnitOfWork
{



    private $desktopAddArray = [];
    private $desktopModifiedArray = array();
    private $desktopDeleteArray = array();

    private $laptopAddArray = [];
    private $laptopModifiedArray = [];
    private $laptopDeleteArray = [];

    private $monitorAddArray = [];
    private $monitorModifiedArray = [];
    private $monitorDeleteArray = [];

    private $tabletAddArray = [];
    private $tabletModifiedArray = [];
    private $tabletDeleteArray = [];

    private $array = array();
    private static $inst;
    private function __construct()
    {


    }

    public static function Instance()
    {
        Self::$inst === null;
        if (Self::$inst === null) {
            Self::$inst = new UnitOfWork();
        }
        return Self::$inst;
    }

    public function registerNew($item, $type) {
        if($type==1) {

            $desktop = new Desktop();
            $desktop = $item;
            $id = $desktop->getElectronicsId();
            $this->desktopAddArray[$id] = $item;

        } elseif ($type==2) {

            $monitor = new Monitor();
            $monitor= $item;
            $id = $monitor->getElectronicsId();
            $this->monitorAddArray[$id] = $item;

        } elseif ($type==3) {

            $laptop = new Laptop();
            $laptop = $item;
            $id = $laptop->getElectronicsId();
            $this->laptopAddArray[$id] = $item;

        } else {


            $tablet = new Tablet();
            $tablet = $item;
            $id = $tablet->getElectronicsId();
            $this->tabletAddArray[$id] = $item;
        }
        $this->array['desktopAddArray'] = $this->desktopAddArray;
        $this->array['monitorAddArray'] = $this->monitorAddArray;
        $this->array['laptopAddArray'] = $this->laptopAddArray;
        $this->array['tabletAddArray'] = $this->tabletAddArray;

    }

    public function registerDirty($item, $type) {
        if($type==1) {

            $desktop = new Desktop();
            $desktop = $item;
            $id = $desktop->getElectronicsId();
            $this->desktopModifiedArray[$id] = $desktop;

        } elseif ($type==2) {

            $monitor = new Monitor();
            $monitor= $item;
            $id = $monitor->getElectronicsId();
            $this->monitorModifiedArray[$id] = $monitor;



        } elseif ($type==3) {

            $laptop = new Laptop();
            $laptop = $item;
            $id = $laptop->getElectronicsId();
            $this->laptopModifiedArray[$id] = $laptop   ;


        } else {

            $tablet = new Tablet();
            $tablet = $item;
            $id = $tablet->getElectronicsId();
            $this->tabletModifiedArray[$id] = $tablet ;

        }

        $this->array['desktopModifiedArray'] = $this->desktopModifiedArray;
        $this->array['monitorModifiedArray'] = $this->monitorModifiedArray;
        $this->array['laptopModifiedArray'] = $this->laptopModifiedArray;
        $this->array['tabletModifiedArray'] = $this->tabletModifiedArray;
    }

    public function registerDeleted(ElectronicSpecification $item, $type) {
        if($type==1) {

            $id = $item.getElectronicsId();
            $this->desktopDeleteArrayArray[$id] = $item;

        } elseif ($type==2) {



        } elseif ($type==3) {



        } else {



        }

        $this->array['desktopDeleteArray'] = $this->desktopDeleteArray;
        $this->array['monitorDeleteArray'] = $this->monitorDeleteArray;
        $this->array['laptopDeleteArray'] = $this->laptopDeleteArray;
        $this->array['tabletDeleteArray'] = $this->tabletDeleteArray;

    }


    public function commit() {

        return $this->array;

    }
//    public function updateregisterNew($item, $type)
//    {
//        $this->tabletArray[$electronicsId]
//          if($type==1) {
//
//              $desktop = new Desktop();
//              $desktop = $item;
//              $id = $desktop->getElectronicsId();
//              $this->desktopAddArray[$id] = $item;
//
//          } elseif ($type==2) {
//
//              $monitor = new Monitor();
//              $monitor= $item;
//              $id = $monitor->getElectronicsId();
//              $this->monitorAddArray[$id] = $item;
//
//          } elseif ($type==3) {
//
//              $laptop = new Laptop();
//              $laptop = $item;
//              $id = $laptop->getElectronicsId();
//              $this->laptopAddArray[$id] = $item;
//
//          } else {
//
//
//              $tablet = new Tablet();
//              $tablet = $item;
//              $id = $tablet->getElectronicsId();
//              $this->tabletAddArray[$id] = $item;
//          }
//        $this->array['desktopAddArray'] = $this->desktopAddArray;
//        $this->array['monitorAddArray'] = $this->monitorAddArray;
//        $this->array['laptopAddArray'] = $this->laptopAddArray;
//        $this->array['tabletAddArray'] = $this->tabletAddArray;
//
//    }
}
