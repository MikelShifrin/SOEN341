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


        $login = false;
        $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = deh4j5oag07pgv";
        $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

        $sql="insert into electronics (BRAND,model_number,price,weight,type) values ('".$monitor->getbrandName()."','". $monitor->getmodelNumber()."','".$monitor->getprice()."','".$monitor->getweight()."','".$monitor->gettype()."')";
        $db = pg_connect( "$host $port $dbname $credentials"  );
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $sql="select * from electronics order by electronics_id DESC limit 1";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $row = pg_fetch_array($ret);
        echo $row[0];
        $sql="insert into monitor (electronics_id,display_size) values ('".$row[0]."','". $monitor->getSize()."')";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }

        pg_close($db);
        return true;
    }

    public function insertTabletintoDB($tablet){


        $login = false;
        $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = deh4j5oag07pgv";
        $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

        $sql="insert into electronics (BRAND,model_number,price,weight,type) values ('".$tablet->getbrandName()."','". $tablet->getmodelNumber()."','".$tablet->getprice()."','".$tablet->getweight()."','".$tablet->gettype()."')";
        $db = pg_connect( "$host $port $dbname $credentials"  );
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $sql="select * from electronics order by electronics_id DESC limit 1";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $row = pg_fetch_array($ret);
        echo $row[0];
        $sql="insert into tablet (electronics_id,processor_type,ram_size,number_of_cpu_cores,hard_disk_size,operating_system,display_size,battery_info,camera_info,length,width,height) values ('".$row[0]."','". $tablet->getProcessorType()."','". $tablet->getRamSize()."','". $tablet->getNumberOfCpuCores()."','". $tablet->getHardDiskSize()."','". $tablet->getOperatingSystem()."','". $tablet->getDisplaySize()."','". $tablet->getBatteryInfo()."','". $tablet->getCameraInfo()."','". $tablet->getLength()."','". $tablet->getWidth()."','". $tablet->getHeight()."')";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }

        pg_close($db);
        return true;
    }
    public function insertLaptopintoDB($laptop){


        $login = false;
        $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = deh4j5oag07pgv";
        $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

        $sql="insert into electronics (BRAND,model_number,price,weight,type) values ('".$laptop->getbrandName()."','". $laptop->getmodelNumber()."','".$laptop->getprice()."','".$laptop->getweight()."','".$laptop->gettype()."')";
        $db = pg_connect( "$host $port $dbname $credentials"  );
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $sql="select * from electronics order by electronics_id DESC limit 1";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $row = pg_fetch_array($ret);
        echo $row[0];
        $sql="insert into laptop  (electronics_id,processor_type,ram_size,number_of_cpu_cores,hard_disk_size,operating_system,display_size,battery_info) values ('".$row[0]."','". $laptop->getProcessorType()."','". $laptop->getRamSize()."','". $laptop->getNumberOfCpuCores()."','". $laptop->getHardDiskSize()."','". $laptop->getOperatingSystem()."','". $laptop->getDisplaySize()."','". $laptop->getBatteryInfo()."')";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }

        pg_close($db);
        return true;
    }
    public function insertDesktopintoDB($desktop){


        $login = false;
        $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = deh4j5oag07pgv";
        $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

        $sql="insert into electronics (BRAND,model_number,price,weight,type) values ('".$desktop->getbrandName()."','". $desktop->getmodelNumber()."','".$desktop->getprice()."','".$desktop->getweight()."','".$desktop->gettype()."')";
        $db = pg_connect( "$host $port $dbname $credentials"  );
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $sql="select * from electronics order by electronics_id DESC limit 1";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }
        $row = pg_fetch_array($ret);
        echo $row[0];
        $sql="insert into desktop (electronics_id,processor_type,ram_size,number_of_cpu_cores,hard_disk_size,length,width,height) values ('".$row[0]."','". $desktop->getProcessorType()."','". $desktop->getRamSize()."','". $desktop->getNumberOfCpuCores()."','". $desktop->getHardDiskSize()."','". $desktop->getLength()."','". $desktop->getWidth()."','". $desktop->getHeight()."')";
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }

        pg_close($db);
        return true;
    }


  }
