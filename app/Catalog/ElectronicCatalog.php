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

            $this->getElectronicsTDG()->insertMonitorintoDB($e);


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
            $this->getElectronicsTDG()->insertLaptopintoDB($e);

        }

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

            $this->getElectronicsTDG()->insertTabletintoDB($e);

        }

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
            $this->getElectronicsTDG()->insertDesktopintoDB($e);


        }

        return "no monitor";

    }

    public function viewInventory($type) {

        $ret = $this->getElectronicsTDG()->viewInventory($type);

        return $ret;
    }

}