<?php

namespace App\Model;


class Tablet extends ElectronicSpecification
{
	private $tablet_id;
	private $electronics_id;
	private $processor_type;
	private $ram_size;
	private $number_of_cpu_cores;
	private $hard_disk_size;
	private $operating_System;
	private $display_size;
	private $battery_info;
	private $camera_info;
	private $length;
	private $height;
	private $width;

	/**
     * @return mixed
     */
    public function getTabletId()
    {
        return $this->tablet_id;
    }

   /**
     * @param mixed $tablet_id
     */
    public function setTabletId($tablet_id)
    {
        $this->tablet_id = $tablet_id;
    }

   /**
     * @return mixed
     */
    public function getElectronicsId()
    {
        return $this->electronics_id;
    }

   /**
     * @param mixed $electronics_id
     */
    public function setElectronicsId($electronics_id)
    {
        $this->electronics_id = $electronics_id;
    }

   /**
     * @return mixed
     */
    public function getProcessorType()
    {
        return $this->processor_type;
    }

   /**
     * @param mixed $processor_type
     */
    public function setProcessorType($processor_type)
    {
        $this->processor_type = $processor_type;
    }

   /**
     * @return mixed
     */
    public function getRamSize()
    {
        return $this->ram_size;
    }

   /**
     * @param mixed $ram_size
     */
    public function setRamSize($ram_size)
    {
        $this->ram_size = $ram_size;
    }

   /**
     * @return mixed
     */
    public function getNumberOfCpuCores()
    {
        return $this->number_of_cpu_cores;
    }

   /**
     * @param mixed $number_of_cpu_cores
     */
    public function setNumberOfCpuCores($number_of_cpu_cores)
    {
        $this->number_of_cpu_cores = $number_of_cpu_cores;
    }

   /**
     * @return mixed
     */
    public function getHardDiskSize()
    {
        return $this->hard_disk_size;
    }

   /**
     * @param mixed $hard_disk_size
     */
    public function setHardDiskSize($hard_disk_size)
    {
        $this->hard_disk_size = $hard_disk_size;
    }

   /**
     * @return mixed
     */
    public function getOperatingSystem()
    {
        return $this->operating_System;
    }

   /**
     * @param mixed $operating_System
     */
    public function setOperatingSystem($operating_System)
    {
        $this->operating_System = $operating_System;
    }

   /**
     * @return mixed
     */
    public function getDisplaySize()
    {
        return $this->display_size;
    }

   /**
     * @param mixed $display_size
     */
    public function setDisplaySize($display_size)
    {
        $this->display_size = $display_size;
    }

   /**
     * @return mixed
     */
    public function getBatteryInfo()
    {
        return $this->battery_info;
    }

   /**
     * @param mixed $battery_info
     */
    public function setBatteryInfo($battery_info)
    {
        $this->battery_info = $battery_info;
    }

   /**
     * @return mixed
     */
    public function getCameraInfo()
    {
        return $this->camera_info;
    }

   /**
     * @param mixed $camera_info
     */
    public function setCameraInfo($camera_info)
    {
        $this->camera_info = $camera_info;
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
    public function setLength($length)
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
    public function setHeight($height)
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
    public function setWidth($width)
    {
        $this->width = $width;
    }
}
   