<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 14-10-2017
 * Time: 03:51
 */

namespace App\TDG;


class UserTDG
{
    public function checkAuthentication($username, $password,$user_type) {

        $login = false;
        $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = deh4j5oag07pgv";
        $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";
//        echo extension_loaded('pgsql') ? 'yes':'no';
//
//        $pdo = DB::connection()->getPdo();
//
//        echo  "$pdo";
        $sql ="SELECT * FROM \"USER\" WHERE EMAIL_ID = '".$username."' AND PASSWORD = '".md5($password)."'
         AND USER_TYPE = '".$user_type."' LIMIT 1";

        $db = pg_connect( "$host $port $dbname $credentials"  );
        if(!$db) {
//            echo "Error : Unable to open database\n";
        } else {
//            echo "Opened database successfully\n";
        }

        $ret = pg_query($db, $sql);
        $row = pg_fetch_array($ret);

        if($row) {
            $login = true;
            return $row;
        } else {
            return $login;
        }

        pg_close($db);

    }

    public function addNewUser($user) {

        $username       = $user->getEmailId();
        $password       = $user->getPassword();
        $firstName      = $user->getFirstName();
        $lastName       = $user->getLastName();
        $addressLineOne = $user->getPhysicalAddressLine1();
        $addressLineTwo = $user->getPhysicalAddressLine2();
        $telephone      = $user->getPhoneNumber();
        $userType       = $user->getUserType();

        $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = deh4j5oag07pgv";
        $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

        $sql = "INSERT INTO \"USER\" (EMAIL_ID,PASSWORD,FIRST_NAME,LAST_NAME,USER_TYPE,physical_address_line1,physical_address_line2,phone_number) 
        VALUES ('".$username."','".md5($password)."','".$firstName."','".$lastName."','".$userType."','".$addressLineOne."','".$addressLineTwo
            ."',".$telephone.")";

        $db = pg_connect( "$host $port $dbname $credentials"  );
        $ret = pg_query($db, $sql);

        //echo $ret;

    }

}