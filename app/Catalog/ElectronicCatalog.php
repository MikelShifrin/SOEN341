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
    

    

    public function additem($request) {

       // if Request is coming from monitor
        if($request->input('type')=='m') {
            $e = new Monitor();
            $e->setbrandName($request->input('brandName'));
            $e->setmodelNumber($request->input('modelNumber'));
            $e->setprice($request->input('price'));
            $e->setweight($request->input('weight'));
            $e->settype($request->input('type'));


            $e->setSize($request->input('size'));
            $electronics_TDG= new ElectronicsTDG();
            $electronics_TDG->insertMonitorintoDB($e);
        }

        //if request is coming from laptop
        if($request->input('type')=='l') {
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
            //DB::insert('insert into electronics (ELECTRONICS_ID , BRAND) values (?, ?)', [2, $brandName]);

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
            //DB::insert('insert into electronics (ELECTRONICS_ID , BRAND) values (?, ?)', [2, $brandName]);


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
            //DB::insert('insert into electronics (ELECTRONICS_ID , BRAND) values (?, ?)', [2, $brandName]);


        }

        return "no monitor";

    }

    public function viewInventory($type) {



    }

}