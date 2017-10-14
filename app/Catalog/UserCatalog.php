<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 22:07
 */

namespace App\Catalog;

use Illuminate\Support\Facades\DB;

use App\Model\User;

class UserCatalog
{
    private $users = Array();
    public function __construct() {
        $users = new User();
        $this->setUsers($users);
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }



    public function authenticate($username, $password) {

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
        $sql ="SELECT * FROM \"USER\" WHERE EMAIL_ID = '".$username."' AND PASSWORD = '".md5($password)."' LIMIT 1";

//            echo $sql;


        $db = pg_connect( "$host $port $dbname $credentials"  );
        if(!$db) {
//            echo "Error : Unable to open database\n";
        } else {
//            echo "Opened database successfully\n";
        }

        $ret = pg_query($db, $sql);
        $row = pg_fetch_array($ret);
//        print_r($row);
        if($row) {

//            echo $row['email_id'];

            $login = true;
            return $login;
        } else {
//            echo "not logged in";
            echo pg_last_error($db);
            $row = pg_fetch_array($ret);
//            echo $row['email_id'];
            return $login;
//            return view( 'login');
        }
        pg_close($db);
//        echo "$username. ' and '.$password";
    }
}