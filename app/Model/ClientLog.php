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
    private $userId;
    private $activityId;
    private $loginDateTime;

    public function __construct()
    {

    }
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param mixed $activity_id
     */
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;
    }

    /**
     * @return mixed
     */
    public function getLoginDatetime()
    {
        return $this->loginDateTime;
    }

    /**
     * @param mixed $login_datetime
     */
    public function setLoginDatetime($loginDateTime)
    {
        $this->loginDateTime = $loginDateTime;
    }


}
