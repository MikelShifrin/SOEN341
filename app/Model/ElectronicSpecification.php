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
    private $electronicsId;
    private $brandName;
    private $modelNumber;
    private $price;
    private $weight;
    private $type;

    public function __construct(int $electronicsId = null,
     String $brandName = null, String $modelNumber = null, int $price = null,
     int $weight = null, $type = null){
        $this->$electronicsId = $electronicsId;
        $this->$brandName = $brandName;
        $this->$modelNumber = $modelNumber;
        $this->$price = $price;
        $this->weight = $weight;
        $this->$type = $type;
    }

    //mutators (setters)
    public function setElectronicsId(int $electronicsId)
    {
        $this->electronicsId = $electronicsId;
    }
    public function setBrandName(String $brandName)
    {
        $this->brandName = $brandName;
    }
    public function setModelNumber(String $modelNumber)
    {
        $this->modelNumber = $modelNumber;
    }
    public function setPrice(int $price)
    {
        $this->price = $price;
    }
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    //accessors (getters)
    public function getElectronicsId()
    {
        return $this->electronicsId;
    }
    public function getBrandName(){
        return $this->brandName;
    }
    public function getModelNumber(){
        return $this->modelNumber;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function getType()
    {
        return $this->type;
    }
}
