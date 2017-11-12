<?php

namespace App\UnitOfWork;

use App\Model\Desktop;
use App\Model\ElectronicSpecification;
use App\Model\Laptop;
use App\Model\Monitor;

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

    public function registerNew(ElectronicSpecification $item, $type) {
        if($type==1) {

            $id = spl_object_hash ($item);
            $this->desktopAddArray[$id] = $item;

        } elseif ($type==2) {

            $id = spl_object_hash ( $item);
            $this->monitorAddArray[$id] = $item;

        } elseif ($type==3) {

            $id = spl_object_hash ( $item);
            $this->laptopAddArray[$id] = $item;

        } else {


            $id = spl_object_hash ( $item);
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

        $array['desktopDeleteArray'] = $this->desktopDeleteArray;
        $array['monitorDeleteArray'] = $this->monitorDeleteArray;
        $array['laptopDeleteArray'] = $this->laptopDeleteArray;
        $array['tabletDeleteArray'] = $this->tabletDeleteArray;

    }

    public function commit() {

        return $this->array;

    }

}
