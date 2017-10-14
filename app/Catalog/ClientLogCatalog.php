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
    private $client_log;
    private $client_log_TDG;
    public function __construct() {

        $client_log = new ClientLog();
        $client_log_TDG = new ClientLogTDG();
        $this->setClientLog($client_log);
        $this->setClientLogTDG($client_log_TDG);
    }

    /**
     * @return mixed
     */
    public function getClientLog()
    {
        return $this->client_log;
    }

    /**
     * @param mixed $client_log
     */
    public function setClientLog($client_log)
    {
        $this->client_log = $client_log;
    }

    /**
     * @return mixed
     */
    public function getClientLogTDG()
    {
        return $this->client_log_TDG;
    }

    /**
     * @param mixed $client_log_TDG
     */
    public function setClientLogTDG($client_log_TDG)
    {
        $this->client_log_TDG = $client_log_TDG;
    }

    public function logActivity($user_id) {

        $this->getClientLogTDG()->logActivity($user_id);
    }

}