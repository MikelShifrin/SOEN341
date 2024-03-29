<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 22:07
 */

namespace App\Catalog;


use App\Model\ElectronicSpecification;
use App\Model\Monitor;
use App\Model\Tablet;
use App\Model\Laptop;
use App\Model\Desktop;
use App\TDG\ElectronicsTDG;
use Illuminate\Support\Facades\DB;

class ElectronicCatalog
{

    private $electronicsTDG;
    private $desktopArray = [];
    private $monitorArray =[];

    /**
     * @return mixed
     */
    public function getElectronicsTDG()
    {
        return $this->electronicsTDG;
    }

    /**
     * @param mixed $electronicsTDG
     */
    public function setElectronicsTDG($electronicsTDG)
    {
        $this->electronicsTDG = $electronicsTDG;
    }

    public function __construct() {
        $electronicsTDG = new ElectronicsTDG();
        $this->setElectronicsTDG($electronicsTDG);
    }

    public function createDesktopArray($desktopArray) {

        while($row = pg_fetch_assoc($desktopArray)){

            $desktop = new Desktop($row['desktop_id'],$row['length'],$row['height'],$row['width'],$row['processor_type'],
                $row['ram_size'],$row['number_of_cpu_cores'],$row['hard_disk_size'],$row['electronics_id'],$row['brand'],
                $row['model_number'],$row['price'],$row['weight'],$row['type']);

            $desktop->setDesktopId($row['desktop_id']);
            $desktop->setLength($row['length']);
            $desktop->setHeight($row['height']);
            $desktop->setWidth($row['width']);
            $desktop->setProcessorType($row['processor_type']);
            $desktop->setRamSize($row['ram_size']);
            $desktop->setNumberOfCpuCores($row['number_of_cpu_cores']);
            $desktop->setHardDiskSize($row['hard_disk_size']);
            $desktop->setElectronicsId($row['electronics_id']);
            $desktop->setBrandName($row['brand']);
            $desktop->setModelNumber($row['model_number']);
            $desktop->setPrice($row['price']);
            $desktop->setWeight($row['weight']);
            $desktop->setType($row['type']);

            $this->desktopArray[$desktop->getElectronicsId()] = $desktop;

        }

        return $this->desktopArray;
    }

    public function createMonitorArray($monitorArray) {

        while($row = pg_fetch_assoc($monitorArray)){

            $monitor = new Monitor();

            $monitor->setMonitorId($row['display_id']);
            $monitor->setBrandName($row['brand']);
            $monitor->setModelNumber($row['model_number']);
            $monitor->setPrice($row['price']);
            $monitor->setSize($row['display_size']);
            $monitor->setWeight($row['weight']);
            $monitor->setElectronicsId($row['electronics_id']);
            $monitor->setType($row['type']);

            $this->monitorArray[$row['electronics_id']] = $monitor;

        }

        return $this->monitorArray;
    }

    public function createLaptopArray($laptopArray) {

        while($row = pg_fetch_assoc($laptopArray)){

            $laptop = new Laptop();

            $laptop->setBrandName($row['brand']);
            $laptop->setModelNumber($row['model_number']);
            $laptop->setPrice($row['price']);
            $laptop->setProcessorType($row['processor_type']);
            $laptop->setRamSize($row['ram_size']);
            $laptop->setNumberOfCpuCores($row['number_of_cpu_cores']);
            $laptop->setHardDiskSize($row['hard_disk_size']);
            $laptop->setOperatingSystem($row['operating_system']);
            $laptop->setDisplaySize($row['display_size']);
            $laptop->setBatteryInfo($row['battery_info']);
            $laptop->setWeight($row['weight']);
            $laptop->setElectronicsId($row['electronics_id']);
            $laptop->setLaptopId($row['laptop_id']);
            $laptop->setType($row['type']);

            $this->laptopArray[$row['electronics_id']] = $laptop;

        }

        return $this->laptopArray;
    }

    public function createTabletArray($tabletArray) {

        while($row = pg_fetch_assoc($tabletArray)){

            $tablet = new Tablet();

            $tablet->setBrandName($row['brand']);
            $tablet->setModelNumber($row['model_number']);
            $tablet->setPrice($row['price']);
            $tablet->setProcessorType($row['processor_type']);
            $tablet->setRamSize($row['ram_size']);
            $tablet->setNumberOfCpuCores($row['number_of_cpu_cores']);
            $tablet->setHardDiskSize($row['hard_disk_size']);
            $tablet->setOperatingSystem($row['operating_system']);
            $tablet->setDisplaySize($row['display_size']);
            $tablet->setBatteryInfo($row['battery_info']);
            $tablet->setCameraInfo($row['camera_info']);
            $tablet->setLength($row['length']);
            $tablet->setHeight($row['height']);
            $tablet->setWidth($row['width']);
            $tablet->setWeight($row['weight']);
            $tablet->setElectronicsId($row['electronics_id']);
            $tablet->setTabletId($row['tablet_id']);
            $tablet->setType($row['type']);

            $this->tabletArray[$row['electronics_id']] = $tablet;

        }

        return $this->tabletArray;
    }



        public function deleteitem($electronics_id) {
        $electronics_TDG = new ElectronicsTDG();
        $this->getElectronicsTDG()->deleterows($electronics_id);
        }

    public function additem($request) {

        $electronics_TDG= new ElectronicsTDG();

       // if Request is coming from monitor
        if($request->input('type')=='m') {
            $e = new Monitor();
            $e->setbrandName($request->input('brandName'));
            $e->setmodelNumber($request->input('modelNumber'));
            $e->setprice($request->input('price'));
            $e->setweight($request->input('weight'));
            $e->settype($request->input('type'));
            $e->setSize($request->input('size'));

            //DB::insert('insert into electronics (ELECTRONICS_ID , BRAND) values (?, ?)', [2, $brandName]);

            //$this->getElectronicsTDG()->insertMonitorintoDB($e);
        }

        //if request is coming from laptop
        elseif($request->input('type')=='l') {
            $e = new Laptop();
            $e->setbrandName($request->input('brandName'));
            $e->setmodelNumber($request->input('modelNumber'));
            $e->setprice($request->input('price'));
            $e->setweight($request->input('weight'));
            $e->settype($request->input('type'));
            $e->setProcessorType($request->input('processor_type'));
            $e->setRamSize($request->input('ram_size'));
            $e->setNumberOfCpuCores($request->input('number_of_cpu_cores'));
            $e->setHardDiskSize($request->input('hard_disk_size'));
            $e->setOperatingSystem($request->input('operatingSystem'));
            $e->setDisplaySize($request->input('displaySize'));
            $e->setBatteryInfo($request->input('battery_info'));
            //$this->getElectronicsTDG()->insertLaptopintoDB($e);
        }
        //if request is for tablet
        elseif($request->input('type')=='t') {
            $e = new Tablet();
            $e->setbrandName($request->input('brandName'));
            $e->setmodelNumber($request->input('modelNumber'));
            $e->setprice($request->input('price'));
            $e->setweight($request->input('weight'));
            $e->settype($request->input('type'));
            $e->setLength($request->input('length'));
            $e->setWidth($request->input('width'));
            $e->setHeight($request->input('height'));
            $e->setProcessorType($request->input('processor_type'));
            $e->setRamSize($request->input('ram_size'));
            $e->setNumberOfCpuCores($request->input('number_of_cpu_cores'));
            $e->setHardDiskSize($request->input('hard_disk_size'));
            $e->setOperatingSystem($request->input('operatingSystem'));
            $e->setDisplaySize($request->input('displaySize'));
            $e->setBatteryInfo($request->input('battery_info'));
            $e->setCameraInfo($request->input('cameraInfo'));
            //$this->getElectronicsTDG()->insertTabletintoDB($e);
        }
        //if request is for desktop
        elseif($request->input('type')=='d') {
            $e = new Desktop();
            $e->setbrandName($request->input('brandName'));
            $e->setmodelNumber($request->input('modelNumber'));
            $e->setprice($request->input('price'));
            $e->setweight($request->input('weight'));
            $e->settype($request->input('type'));
            $e->setLength($request->input('length'));
            $e->setWidth($request->input('width'));
            $e->setHeight($request->input('height'));
            $e->setProcessorType($request->input('processor_type'));
            $e->setRamSize($request->input('ram_size'));
            $e->setNumberOfCpuCores($request->input('number_of_cpu_cores'));
            $e->setHardDiskSize($request->input('hard_disk_size'));
            //$this->getElectronicsTDG()->insertDesktopintoDB($e);
        }
        $e->setElectronicsId($_SESSION['ElectronicsIdAddInternalCounter']);
        $_SESSION['ElectronicsIdAddInternalCounter']=$_SESSION['ElectronicsIdAddInternalCounter']+1;
        return $e; // returning the elctronics object after initializing
    }

    public function viewInventory($type) {
        $ret = $this->getElectronicsTDG()->viewInventory($type);
        return $ret;
    }

    public function deleteInventory($type) {
                $ret = $this->getElectronicsTDG()->deleteInventory($type);
                return $ret;
            }

    public function modifyInventory($item , $type, $request) {

        if($type == 1) {


            $item->setBrandName($request->input('brand'));
            $item->setModelNumber($request->input('modelNumber'));
            $item->setPrice($request->input('price'));
            $item->setLength($request->input('length'));
            $item->setHeight($request->input('height'));
            $item->setWidth($request->input('width'));
            $item->setProcessorType($request->input('processorType'));
            $item->setRamSize($request->input('ramSize'));
            $item->setNumberOfCpuCores($request->input('cpuCores'));
            $item->setHardDiskSize($request->input('hardDiskSize'));
            $item->setWeight($request->input('weight'));
            $item->setElectronicsId($request->input('hiddenElectronicsId'));

            return $item;
        }

        if($type == 2) {

            $item->setBrandName($request->input('brand'));
            $item->setModelNumber($request->input('modelNumber'));
            $item->setPrice($request->input('price'));
            $item->setSize($request->input('displaySize'));
            $item->setWeight($request->input('weight'));
            $item->setElectronicsId($request->input('hiddenElectronicsId'));

            return $item;
        }

        if($type == 3) {

            $item->setBrandName($request->input('brand'));
            $item->setModelNumber($request->input('modelNumber'));
            $item->setPrice($request->input('price'));
            $item->setProcessorType($request->input('processorType'));
            $item->setRamSize($request->input('ramSize'));
            $item->setNumberOfCpuCores($request->input('cpuCores'));
            $item->setHardDiskSize($request->input('hardDiskSize'));
            $item->setOperatingSystem($request->input('operatingSystem'));
            $item->setDisplaySize($request->input('displaySize'));
            $item->setBatteryInfo($request->input('batteryInfo'));
            $item->setWeight($request->input('weight'));
            $item->setElectronicsId($request->input('hiddenElectronicsId'));

            return $item;
        }

        if($type == 4) {

            $item->setBrandName($request->input('brand'));
            $item->setModelNumber($request->input('modelNumber'));
            $item->setPrice($request->input('price'));
            $item->setProcessorType($request->input('processorType'));
            $item->setRamSize($request->input('ramSize'));
            $item->setNumberOfCpuCores($request->input('cpuCores'));
            $item->setHardDiskSize($request->input('hardDiskSize'));
            $item->setOperatingSystem($request->input('operatingSystem'));
            $item->setDisplaySize($request->input('displaySize'));
            $item->setBatteryInfo($request->input('batteryInfo'));
            $item->setCameraInfo($request->input('cameraInfo'));
            $item->setLength($request->input('length'));
            $item->setHeight($request->input('height'));
            $item->setWidth($request->input('width'));
            $item->setWeight($request->input('weight'));
            $item->setElectronicsId($request->input('hiddenElectronicsId'));

            return $item;
        }


    }
}
