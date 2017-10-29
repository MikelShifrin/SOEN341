<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 14-10-2017
 * Time: 05:08
 */

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

    /**
     * @return mixed
     */
    public function getClientLog()
    {
        return $this->clientLog;
    }

    /**
     * @param mixed $client_log
     */
    public function setClientLog($clientLog)
    {
        $this->clientLog = $clientLog;
    }

    /**
     * @return mixed
     */
    public function getClientLogTDG()
    {
        return $this->clientLogTDG;
    }

    /**
     * @param mixed $client_log_TDG
     */
    public function setClientLogTDG($clientLogTDG)
    {
        $this->clientLogTDG = $clientLogTDG;
    }

    public function logActivity($userId) {

        $this->getClientLogTDG()->logActivity($userId);
    }

}
