<?php

namespace App\UnitOfWork;

use App\Model\ElectronicSpecification;

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


    public function registerNew(ElectronicSpecification $item, $type) {
        if($type==1) {

            $id = $item.getElectronicsId();
            $this->desktopAddArray[$id] = $item;

        } elseif ($type==2) {



        } elseif ($type==3) {



        } else {



        }
        $array['desktopAddArray'] = $this->desktopAddArray;
        $array['monitorAddArray'] = $this->monitorAddArray;
        $array['laptopAddArray'] = $this->laptopAddArray;
        $array['tabletAddArray'] = $this->tabletAddArray;

    }

    public function registerDirty(ElectronicSpecification $item, $type) {
        if($type==1) {

            $id = $item.getElectronicsId();
            $this->desktopModifiedArray[$id] = $item;

        } elseif ($type==2) {



        } elseif ($type==3) {

            $id = $item.getElectronicsId();
            $this->laptopModifiedArray[$id] = $item;


        } else {



        }

        $array['desktopModifiedArray'] = $this->desktopModifiedArray;
        $array['monitorModifiedArray'] = $this->monitorModifiedArray;
        $array['laptopModifiedArray'] = $this->laptopModifiedArray;
        $array['tabletModifiedArray'] = $this->tabletModifiedArray;
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