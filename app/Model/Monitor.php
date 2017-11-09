<?php

namespace App\Model;


class Monitor extends ElectronicSpecification
{
   private $Size;
   private $monitorId;
   private $electronicsId;

   /**
     * @return mixed
     */
    public function getMonitorId()
    {
        return $this->monitorId;
    }

   /**
     * @param mixed $monitor_id
     */
    public function setMonitorId($monitorId)
    {
        $this->monitorId = $monitorId;
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
        return $this->electronicsId;
    }

   /**
     * @param mixed $electronics_id
     */
    public function setElectronicsId(int $electronicsId)
    {
        $this->electronicsId = $electronicsId;
    }



}
