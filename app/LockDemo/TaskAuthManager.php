<?php

namespace LockDemo;

use BeatSwitch\Lock\Callers\CallerLock;
use BeatSwitch\Lock\Manager;

class TaskAuthManager
{
    public function __construct(Manager $lockManager, CallerLock $callerLock)
    {
        $this->lockManager = $lockManager;

        $this->callerLock = $callerLock;
    }

    public function setPermissions()
    {
        /** @var \BeatSwitch\Lock\Callers\Caller $callersTasks */
        $callersTasks = $this->callerLock->getCaller()->tasks()->get();

        //set permissions on all the tasks that belong to this user
        foreach($callersTasks as $task) {

            pp($this->callerLock->can('read', 'tasks', 1), 0);
            //$this->lockManager->caller($this->callerLock->getCaller())->allow('read', 'tasks', $task->getCallerId());
            $this->lockManager->caller($this->callerLock->getCaller())->allow('all');
            pp($this->callerLock->can('read', 'tasks', 1));
        }

    }
}