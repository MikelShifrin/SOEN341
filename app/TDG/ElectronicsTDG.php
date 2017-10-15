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

    public function insertTabletintoDB($monitor){


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
    public function insertLaptopintoDB($monitor){


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
    public function insertDesktopintoDB($monitor){


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


  }
