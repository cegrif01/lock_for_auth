<?php

namespace LockDemo;

use BeatSwitch\Lock\Callers\Caller;
use Exception;

class TpsReportGenerator implements  Caller
{
    public function __construct(Caller $authUser)
    {
        $this->authUser = $authUser;
    }

    public function workOnSaturday()
    {
        $this->authCheck($this->authUser, 'workOnSaturday', 'Saturday');

        return "I'm gonna need you to work on Saturday... Yeahhhh";
    }

    public function workOnSunday()
    {
        $this->authCheck($this->authUser, 'workOnSunday', 'Sunday');

        return "And Sunday too... Yeahhhh";
    }

    public function getCallerType()
    {
        return 'tps_report_generator';
    }

    public function getCallerId()
    {
        return null;
    }

    public function getCallerRoles()
    {
        return [];
    }

    protected function authCheck(Caller $user, $permissionName, $day)
    {
        if($user->cannot($permissionName, 'tps_report_generator')) {
            throw new Exception("You are not allowed to work on $day.  Screw Lumberg");
        }
    }
}
