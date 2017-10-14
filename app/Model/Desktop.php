<?php

namespace App\Model;


class Desktop extends ElectronicSpecification
{
Private $desktop_id;
private $electronics_id;
private $length;
private $height;
private $width;
private $processor_type;
private $ram_size;
private $number_of_cpu_cores;
private $hard_disk_size;

/**
     * @return mixed
     */
    public function getDesktopId()
    {
        return $this->desktop_id;
    }

   /**
     * @param mixed $desktop_id
     */
    public function setDesktopId($desktop_id)
    {
        $this->desktop_id = $desktop_id;
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
    
}  