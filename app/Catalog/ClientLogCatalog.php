<?php
namespace App\Catalog;

use App\Model\ClientLog;
use App\TDG\ClientLogTDG;

class ClientLogCatalog
{
    private $clientLog;
    private $clientLogTDG;

    public function __construct()
    {
        $this->clientLog = new ClientLog();
        $this->clientLogTDG = new ClientLogTDG();
    }

    public function getClientLog()
    {
        return $this->clientLog;
    }

    public function setClientLog($clientLog)
    {
        $this->clientLog = $clientLog;
    }

    public function getClientLogTDG()
    {
        return $this->clientLogTDG;
    }

    public function setClientLogTDG($clientLogTDG)
    {
        $this->clientLogTDG = $clientLogTDG;
    }

    public function logActivity($userId)
    {
        $this->getClientLogTDG()->logActivity($userId);
    }
}
