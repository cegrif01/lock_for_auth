<?php

namespace LockDemo;

use User;
use Exception;
use BeatSwitch\Lock\Callers\Caller;

class TpsReportGenerator implements  Caller
{
    public function __construct(User $authUser)
    {
        $this->authUser = $authUser;
    }

    public function workOnSaturday()
    {
        if($this->authUser->cannot('workOnSaturday', 'tps_report_generator')) {
            throw new Exception('You are not allowed to work on Saturday.  Screw Lumberg');
        }

        return "I'm gonna need you to work on Saturday... Yeahhhh";
    }

    public function workOnSunday()
    {
        if($this->authUser->cannot('workOnSunday', 'tps_report_generator')) {
            throw new Exception('You are not allowed to work on Sunday.  Screw Lumberg');
        }

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
}
