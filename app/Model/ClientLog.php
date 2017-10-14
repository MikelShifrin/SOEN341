<?php
/**
 * Created by PhpStorm.
 * User: vivek
 * Date: 14-10-2017
 * Time: 05:10
 */

namespace App\Model;


class ClientLog
{
    private $user_id;
    private $activity_id;
    private $login_datetime;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * @param mixed $activity_id
     */
    public function setActivityId($activity_id)
    {
        $this->activity_id = $activity_id;
    }

    /**
     * @return mixed
     */
    public function getLoginDatetime()
    {
        return $this->login_datetime;
    }

    /**
     * @param mixed $login_datetime
     */
    public function setLoginDatetime($login_datetime)
    {
        $this->login_datetime = $login_datetime;
    }


}