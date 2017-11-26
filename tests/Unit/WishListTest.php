<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class WishListTest extends TestCase
{
    /** @test */
    public function TestwishId()
    {
        $desktop = new \App\Model\WishList;
        $desktop->setwishId('100');
        $this->assertEquals($desktop->getwishId(), '100');
    }

    /** @test */
    public function TestElectronics()
    {
        $desktop = new \App\Model\WishList;
        $desktop->setElectronics('100');
        $this->assertEquals($desktop->getElectronics(), '100');
    }

    /** @test */
    public function TestUser()
    {
        $desktop = new \App\Model\WishList;
        $desktop->setUser('100');
        $this->assertEquals($desktop->getUser(), '100');
    }

}