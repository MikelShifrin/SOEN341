<?php

namespace App\Model;


class Monitor extends ElectronicSpecification
{
   private $Size;
   private $monitor_id;
   private $electronics_id;

   /**
     * @return mixed
     */
    public function getMonitorId()
    {
        return $this->monitor_id;
    }

   /**
     * @param mixed $monitor_id
     */
    public function setMonitorId($monitor_id)
    {
        $this->monitor_id = $monitor_id;
    }
   

    public function getSize(){
        return $this->Size;
    }

    
    public function setSize($Size){
        $this->Size = $Size;
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



}
