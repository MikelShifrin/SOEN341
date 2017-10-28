<?php


class Mapper
{
    private $identityMap;
    private $unitOfWork;
    private $clientCatalog;
    private $electronicCatalog;
    private $userCatalog;
    private $clientLogTDG;
    private $electronicsTDG;
    private $userTDG;

    public function __construct()
    {
    }

    //all mutators (setters)
    public function setIdentityMap($identityMap)
    {
        $this->$identityMap = $identityMap;
    }
    public function setUnitOfWork($unitOfWork)
    {
        $this->$unitOfWork = $unitOfWork;
    }
    public function setClientCatalog($clientCatalog)
    {
        $this->$clientCatalog = $clientCatalog;
    }
    public function setElectronicCatalog($electronicCatalog)
    {
        $this->$electronicCatalog = $electronicCatalog;
    }
    public function setUserCatalog()
    {

    }
    public function setClientLogTDG()
    {

    }
    public function setElectronicsTDG()
    {

    }
    public function setUserTDG()
    {

    }

    //all accessors (getters)
    public function getIdentityMap()
    {
        return $this->$identityMap;
    }
    public function getUnitOfWork()
    {
        return $this->$unitOfWork;
    }
    public function getClientCatalog()
    {
        return $this->$clientCatalog;
    }
    public function getElectronicCatalog()
    {
        return $this->$electronicCatalog;
    }
    public function getUserCatalog()
    {
        return $this->$userCatalog;
    }
    public function getClientLogTDG()
    {
        return $this->clientLogTDG;
    }
    public function getElectronicsTDG()
    {
        return $this->electronicsTDG;
    }
    public function getUserTDG()
    {
        return $this->userTDG;
    }

}
