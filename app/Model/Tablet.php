<?php
namespace App\Model;

class Tablet extends ElectronicSpecification
{
    private $tabletId;
    private $electronicsId;
    private $processorType;
    private $ramSize;
    private $numberOfCpuCores;
    private $hardDiskSize;
    private $operatingSystem;
    private $displaySize;
    private $batteryInfo;
    private $cameraInfo;
    private $length;
    private $height;
    private $width;

    /**
     * @return mixed
     */
    public function getTabletId()
    {
        return $this->tabletId;
    }

    /**
     * @param mixed $tablet_id
     */
    public function setTabletId(int $tabletId)
    {
        $this->tablet_id = $tabletId;
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

    /**
     * @return mixed
     */
    public function getCameraInfo()
    {
        return $this->cameraInfo;
    }

    /**
     * @param mixed $camera_info
     */
    public function setCameraInfo(int $cameraInfo)
    {
        $this->cameraInfo = $cameraInfo;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength(int $length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }
}
