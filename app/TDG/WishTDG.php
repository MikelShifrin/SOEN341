<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 11/16/2017
 * Time: 8:15 PM
 */

namespace App\TDG;


class WishTDG
{
    private $host        = "host = ec2-23-21-92-251.compute-1.amazonaws.com";
    private $port        = "port = 5432";
    private $dbname      = "dbname = deh4j5oag07pgv";
    private $credentials = "user = tynrrnfvnesgly password=2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";
    public function insertWishintoDB($ElectronicsID,$clientID)
    {

        $sql="insert into wishlist (ElectronicsId,ClientID) values ('".$ElectronicsID."','". $clientID."')";
        $db = pg_connect( "$this->host $this->port $this->dbname $this->credentials"  );
        $ret = pg_query($db, $sql);
        if(!$ret) {
            pg_close($db);
            return false;
        }

        pg_close($db);
        return true;
    }

}