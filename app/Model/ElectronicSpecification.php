<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 13-10-2017
 * Time: 21:25
 */

namespace App\Model;


class ElectronicSpecification
{
   private $electronics_id;
   private $brandName; 
   private $modelNumber;
   private $price;
   private $weight;
   private $displaySize;
   private $type;

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


   public function getbrandName(){
        return $this->brandName;
    }

    
    public function setbrandName($brandName){
        $this->brandName = $brandName;
    }
    
    public function getmodelNumber(){
        return $this->modelName;
    }

    
    public function setmodelNumber($modelNumber){
        $this->modelNumber = $modelNumber;
    }

    public function getprice(){
        return $this->price;
    }

    
    public function setprice($price){
        $this->price = $price;
    }

    public function getweight(){
        return $this->weight;
    }

    
    public function setweight($weight){
        $this->weight = $weight;
    }

    public function getdisplaySize(){
        return $this->displaySize;
    }

    
    public function setdisplaySize($displaySize){
        $this->displaySize = $displaySize;
    }

    public function gettype(){
        return $this->type;
    }

    
    public function settype($type){
        $this->type = $type;
    }

}