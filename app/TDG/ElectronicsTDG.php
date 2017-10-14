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

    public function viewInventory($type) {

        if($type==1) {

            $login = false;
            $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
            $port        = "port = 5432";
            $dbname      = "dbname = deh4j5oag07pgv";
            $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

            $db = pg_connect( "$host $port $dbname $credentials"  );
            if(!$db) {
//                echo "Error : Unable to open database\n";
            } else {
//                echo "Opened database successfully\n";
            }

            $sql ="SELECT a.*,b.* 
                  FROM Desktop a
                  inner join electronics b 
                  on a.ELECTRONICS_ID = B.ELECTRONICS_ID
                  WHERE B.TYPE = 'd'";

            $ret = pg_query($db, $sql);

            return $ret;

        }

    }
}