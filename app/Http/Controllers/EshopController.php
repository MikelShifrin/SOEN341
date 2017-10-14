<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 19:15
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Session\Store;


class EshopController extends Controller
{
    private $user_catalog;




    public function login(Store $session, Request $request) {


        

        return view( 'welcome');
    }

}