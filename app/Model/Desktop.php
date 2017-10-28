<?php

namespace App\Model;


class Desktop extends ElectronicSpecification
{
    private int $desktopId;
    private int $length;
    private int $height;
    private int $width;
    private String $processorType;
    private int $ramSize;
    private int $numberOfCpuCores;
    private int $hardDiskSize;

    public function __construct(int $desktopId = null, int $length = null,
    int $height = null, int $width = null, String $processorType = null,
    int $ramSize = null, int $numberOfCpuCores = null,
    int $hardDiskSize = null, int $electronicsId = null,
    String $brandName = null, String $modelNumber = null, int $price = null,
    int $weight = null, $type = null)
    {
        $this->$desktopId = $desktopId;
        $this->$length = $length;
        $this->$height = $height;
        $this->$width = $width;
        $this->$processorType = $processorType;
        $this->$ramSize = $ramSize;
        $this->$numberOfCpuCores = $numberOfCpuCores;
        $this->hardDiskSize = $hardDiskSize;

        parent::__construct($electronicsId, $brandName, $modelNumber, $price,
        $weight, $type);
    }

    //mutators (setters)
    public function setDesktopId($desktopId)
    {
        $this->desktopId = $desktopId;
    }
    public function setElectronicsId($electronicsId)
    {
        $this->electronicsId = $electronicsId;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }
    public function setWidth($width)
    {
       $this->width = $width;
    }
    public function setProcessorType($processorType)
    {
        $this->processorType = $processorType;
    }
    public function setRamSize($ramSize)
    {
        $this->ramSize = $ramSize;
    }
    public function setNumberOfCpuCores($numberOfCpuCores)
    {
        $this->numberOfCpuCores = $numberOfCpuCores;
    }
    public function setHardDiskSize($hardDiskSize)
    {
        $this->hardDiskSize = $hardDiskSize;
    }

    //accessors (getters)
    public function getDesktopId()
    {
        return $this->desktopId;
    }
    public function getElectronicsId()
    {
        return $this->electronicsId;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function getProcessorType()
    {
        return $this->processorType;
    }
    public function getRamSize()
    {
        return $this->ramSize;
    }
    public function getNumberOfCpuCores()
    {
        return $this->numberOfCpuCores;
    }
    public function getHardDiskSize()
    {
        return $this->hardDiskSize;
    }
}
