<?php

namespace LockDemo;

use BeatSwitch\Lock\Callers\CallerLock;
use BeatSwitch\Lock\Manager;

/**
 * Here we manage authentication and permissions
 * for the application
 *
 * @package LockDemo
 */
class AuthManager
{
    /**
     * @var \BeatSwitch\Lock\Manager
     */
    protected $lockManager;

    /**
     * @param \BeatSwitch\Lock\Manager $lockManager
     * @param \BeatSwitch\Lock\Callers\CallerLock $callerLock
     */
    public function __construct(Manager $lockManager, CallerLock $callerLock)
    {
        $this->lockManager = $lockManager;

        $this->callerLock = $callerLock;
    }

    public function setPermissions()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $callersTasks */
        $callersTasks = $this->callerLock->getCaller()->tasks()->get();

        //set permissions on all the tasks that belong to this user
        foreach($callersTasks as $task) {

            $this->lockManager
                 ->caller($this->callerLock->getCaller())
                 ->allow('read', 'tasks', (int) $task->getCallerId());
        }

    }
}