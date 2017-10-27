<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 14-10-2017
 * Time: 05:13
 */

namespace App\TDG;


class ClientLogTDG
{
    public function logActivity($user_id) {


        $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = deh4j5oag07pgv";
        $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

        $sql ="INSERT INTO USER_aCTIVITY(USER_ID,LOGIN_DATETIME) VALUES(".$user_id.", localtimestamp)";


        $db = pg_connect("$host $port $dbname $credentials");
        if(!$db) {
//            echo "Error : Unable to open database\n";
        } else {
//            echo "Opened database successfully\n";
        }

        $ret = pg_query($db, $sql);
        if(!$ret) {
            echo pg_last_error($db);
        } else {
        }
        pg_close($db);

    }
}