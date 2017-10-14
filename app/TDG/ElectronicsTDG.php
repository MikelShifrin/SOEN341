<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 10/14/2017
 * Time: 10:24 AM
 */

namespace App\TDG;
use Illuminate\Support\Facades\DB;
use App\Model\Monitor;
class ElectronicsTDG
{
    public function insertMonitorintoDB($monitor){


       // DB::insert('insert into electronics (BRAND) values (?)', [$monitor->getbrandName()]);
    }
}