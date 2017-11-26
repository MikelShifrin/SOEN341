<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DesktopTest extends TestCase
{
    /** @test */
    public function TestDesktopHeight()
    {
        $desktop = new \App\Model\Desktop;
        $desktop->setHeight('100');
        $this->assertEquals($desktop->getHeight(), '100');
    }

    /** @test */
    public function TestDesktopID()
    {
      $desktop = new \App\Model\Desktop;
      $desktop->setDesktopId('100');
      $this->assertEquals($desktop->getDesktopId(), '100');
    }
  
    /** @test */
    public function TestDesktopLenght()
    {
    $desktop = new \App\Model\Desktop;
    $desktop->setLength('100');
    $this->assertEquals($desktop->getLength(), '100');
    }

    /** @test */
    public function TestDesktopWidht()
    {
    $desktop = new \App\Model\Desktop;
    $desktop->setWidth('100');
    $this->assertEquals($desktop->getWidth(), '100');
    }

    /** @test */
    public function TestDesktopProcessorType()
    {
    $desktop = new \App\Model\Desktop;
    $desktop->setProcessorType('100');
    $this->assertEquals($desktop->getProcessorType(), '100');
    }

    /** @test */
    public function TestDesktopRamSize()
    {
    $desktop = new \App\Model\Desktop;
    $desktop->setRamSize('100');
    $this->assertEquals($desktop->getRamSize(), '100');
    }

    /** @test */
    public function TestDesktopNumberOfCores()
    {
    $desktop = new \App\Model\Desktop;
    $desktop->setNumberOfCpuCores('100');
    $this->assertEquals($desktop->getNumberOfCpuCores(), '100');
    }

    /** @test */
    public function TestDesktopHardDiskSize()   
    {
    $desktop = new \App\Model\Desktop;
    $desktop->setHardDiskSize('100');
    $this->assertEquals($desktop->getHardDiskSize(), '100');
    }

}

class ElectronicSpecificationTest extends TestCase
{
    /** @test */
    public function TestDesktopHeight()
    {
        $desktop = new \App\Model\ElectronicSpecification;
        $desktop->setElectronicsId('100');
        $this->assertEquals($desktop->getElectronicsId(), '100');
    }

    /** @test */
    public function TestbrandName()
    {
      $desktop = new \App\Model\ElectronicSpecification;
      $desktop->setbrandName('100');
      $this->assertEquals($desktop->getbrandName(), '100');
    }
  
    /** @test */
    public function TestmodelNumber()
    {
    $desktop = new \App\Model\ElectronicSpecification;
    $desktop->setmodelNumber('100');
    $this->assertEquals($desktop->getmodelNumber(), '100');
    }

    /** @test */
    public function Testprice()
    {
    $desktop = new \App\Model\ElectronicSpecification;
    $desktop->setprice('100');
    $this->assertEquals($desktop->getprice(), '100');
    }

    /** @test */
    public function Testweight()
    {
    $desktop = new \App\Model\ElectronicSpecification;
    $desktop->setweight('100');
    $this->assertEquals($desktop->getweight(), '100');
    }

    /** @test */
    public function Testtype()
    {
    $desktop = new \App\Model\ElectronicSpecification;
    $desktop->settype('100');
    $this->assertEquals($desktop->getType(), '100');
    }

}

class LaptopTest extends TestCase
{
    /** @test */
    public function TestLaptopId()
    {
        $desktop = new \App\Model\Laptop;
        $desktop->setLaptopId('100');
        $this->assertEquals($desktop->getLaptopId(), '100');
    }

    /** @test */
    public function TestElectronicsId()
    {
      $desktop = new \App\Model\Laptop;
      $desktop->setElectronicsId('100');
      $this->assertEquals($desktop->getElectronicsId(), '100');
    }
  
    /** @test */
    public function TestProcessorType()
    {
    $desktop = new \App\Model\Laptop;
    $desktop->setProcessorType('100');
    $this->assertEquals($desktop->getProcessorType(), '100');
    }

    /** @test */
    public function TestRamSize()
    {
    $desktop = new \App\Model\Laptop;
    $desktop->setRamSize('100');
    $this->assertEquals($desktop->getRamSize(), '100');
    }

    /** @test */
    public function TestNumberOfCpuCores()
    {
    $desktop = new \App\Model\Laptop;
    $desktop->setNumberOfCpuCores('100');
    $this->assertEquals($desktop->getNumberOfCpuCores(), '100');
    }

    /** @test */
    public function TestHardDiskSize()
    {
    $desktop = new \App\Model\Laptop;
    $desktop->setHardDiskSize('100');
    $this->assertEquals($desktop->getHardDiskSize(), '100');
    }

}

class MonitorTest extends TestCase
{
    /** @test */
    public function TestmonitorId()
    {
        $desktop = new \App\Model\Monitor;
        $desktop->setmonitorId('100');
        $this->assertEquals($desktop->getmonitorId(), '100');
    }

    /** @test */
    public function TestSize()
    {
    $desktop = new \App\Model\Monitor;
    $desktop->setSize('100');
    $this->assertEquals($desktop->getSize(), '100');
    }
    
    /** @test */
    public function TestelectronicsId()
    {
    $desktop = new \App\Model\Monitor;
    $desktop->setelectronicsId('100');
    $this->assertEquals($desktop->getelectronicsId(), '100');
    }
}