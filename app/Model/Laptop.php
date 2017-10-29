<?php

namespace App\Model;


class Laptop extends ElectronicSpecification
{
private $laptopId;
private $electronicsId;
private $processorType;
private $ramSize;
private $numberOfCpuCores;
private $hardDiskSize;
private $operatingSystem;
private $displaySize;
private $batteryInfo;

/**
     * @return mixed
     */
    public function getLaptopId()
    {
        return $this->laptopId;
    }

   /**
     * @param mixed $laptop_id
     */
    public function setLaptopId(int $laptopId)
    {
        $this->laptopId = $laptopId;
    }

   /**
     * @return mixed
     */
    public function getElectronicsId()
    {
        return $this->electronicsId;
    }

   /**
     * @param mixed $electronics_id
     */
    public function setElectronicsId(int $electronicsId)
    {
        $this->electronicsId = $electronicsId;
    }

   /**
     * @return mixed
     */
    public function getProcessorType()
    {
        return $this->processorType;
    }

   /**
     * @param mixed $processor_type
     */
    public function setProcessorType(String $processorType)
    {
        $this->processorType = $processorType;
    }

   /**
     * @return mixed
     */
    public function getRamSize()
    {
        return $this->ramSize;
    }

   /**
     * @param mixed $ram_size
     */
    public function setRamSize(int $ramSize)
    {
        $this->ramSize = $ramSize;
    }

   /**
     * @return mixed
     */
    public function getNumberOfCpuCores()
    {
        return $this->numberOfCpuCores;
    }

   /**
     * @param mixed $number_of_cpu_cores
     */
    public function setNumberOfCpuCores(int $numberOfCpuCores)
    {
        $this->numberOfCpuCores = $numberOfCpuCores;
    }

   /**
     * @return mixed
     */
    public function getHardDiskSize()
    {
        return $this->hardDiskSize;
    }

   /**
     * @param mixed $hard_disk_size
     */
    public function setHardDiskSize(int $hardDiskSize)
    {
        $this->hardDiskSize = $hardDiskSize;
    }

   /**
     * @return mixed
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

   /**
     * @param mixed $operating_System
     */
    public function setOperatingSystem(String $operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

   /**
     * @return mixed
     */
    public function getDisplaySize()
    {
        return $this->displaySize;
    }

   /**
     * @param mixed $display_size
     */
    public function setDisplaySize(int $displaySize)
    {
        $this->displaySize = $displaySize;
    }

   /**
     * @return mixed
     */
    public function getBatteryInfo()
    {
        return $this->batteryInfo;
    }

   /**
     * @param mixed $battery_info
     */
    public function setBatteryInfo(int $batteryInfo)
    {
        $this->batteryInfo = $batteryInfo;
    }
}
