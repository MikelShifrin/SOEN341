<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class addTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //* @test */
    public function testExample()
    {

//        $this->browse(function ($browser) {
            $this->visit('/addinventorymonitor')
                ->type('HP', 'brandName')
                ->press('addMonitor')
                ->seePageIs('/welcome');
//        });


        echo "Test done!!!!!!!!!!";
        $this->assertTrue(true);
    }
}
