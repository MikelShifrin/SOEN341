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
use Illuminate\Support\Facades\DB;

class ElectronicCatalog
{
    

    

    public function additem($request) {

        
         $e = new Monitor();

        $e->setbrandName($request->input('brandName'));

        $brandName= $e->getbrandName();

        DB::insert('insert into electronics (ELECTRONICS_ID , BRAND) values (?, ?)', [2, $brandName]);

        return $brandName;

    }
}