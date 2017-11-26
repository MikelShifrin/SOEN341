<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class ElectronicsTDG extends TestCase
{
       
    /** @test */
    public function TestDeleteDesktop()
    {
        $ElectronicsTDG = new \App\TDG\ElectronicsTDG;

    $ElectronicsTDG->deleteDesktop('12');
    $this->asserttrue($ElectronicsTDG->deleteDesktop(12), 'true'); 

    }

    /** @test */
    public function TestDeleteMonitor()
    {
        $ElectronicsTDG = new \App\TDG\ElectronicsTDG;

    $ElectronicsTDG->deleteMonitor('12');
    $this->asserttrue($ElectronicsTDG->deleteMonitor(12), 'true'); 

    }
    /** @test */
    public function TestDeleteTablet()
    {
        $ElectronicsTDG = new \App\TDG\ElectronicsTDG;

    $ElectronicsTDG->deleteTablet('12');
    $this->asserttrue($ElectronicsTDG->deleteTablet(12), 'true'); 

    }
    /** @test */
    public function TestDeleteLaptop()
    {
        $ElectronicsTDG = new \App\TDG\ElectronicsTDG;

    $ElectronicsTDG->deleteLaptop('12');
    $this->asserttrue($ElectronicsTDG->deleteLaptop(12), 'true'); 

    }
   
}
