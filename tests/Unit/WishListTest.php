<?php

namespace Tests\Unit;

use PhpParser\Node\Expr\Array_;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class WishListTest extends TestCase
{
//    /** @test */
//    public function TestwishId()
//    {
//        $desktop = new \App\Model\WishList;
//        $desktop->setwishId('100');
//        $this->assertEquals($desktop->getwishId(), '100');
//    }
//
//    /** @test */
//    public function TestElectronics()
//    {
//        $desktop = new \App\Model\WishList;
//        $desktop->setElectronics('100');
//        $this->assertEquals($desktop->getElectronics(), '100');
//    }
//
//    /** @test */
//    public function TestUser()
//    {
//        $desktop = new \App\Model\WishList;
//        $desktop->setUser('100');
//        $this->assertEquals($desktop->getUser(), '100');
//    }
    /** @test */
    public function TestWishList() {
//                @session_start();
        $_SESSION = array();
        $_SESSION['user_type'] = "user";
        $_SESSION['WishIdAddInternalCounterInitial'] = 10000000;
        $_SESSION['WishIdAddInternalCounter'] = 10000000;


               $eshopController = new \App\Http\Controllers\EshopController;
               $user = Array();
               $user['user_id'] = 5;
                $_SESSION['user'] = $user;

                $eshopController->viewInventory(2,'default');
               $eshopController->addtoWishList(2,77);
               $success = "";
               $this->assertEquals($eshopController->getSuccessTest(),"Added succesfully to wishlist");

    }



}