<?php

namespace LockDemo;

use BeatSwitch\Lock\Callers\CallerLock;
use BeatSwitch\Lock\Manager;

class AuthManager
{
    public function __construct(Manager $lockManager, CallerLock $callerLock)
    {
        $this->lockManager = $lockManager;

        $this->callerLock = $callerLock;
    }

    public function setPermissions()
    {
//        /** @var \BeatSwitch\Lock\Callers\Caller $callersTasks */
//        $callersTasks = $this->callerLock->getCaller()->tasks()->get();
//
//        //set permissions on all the tasks that belong to this user
//        foreach($callersTasks as $task) {
//
//            $this->lockManager
//                ->caller($this->callerLock->getCaller())
//                ->allow('read', 'tasks', (int) $task->getCallerId());
//        }

    }
}