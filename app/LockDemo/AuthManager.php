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
        $authUser = $this->callerLock->getCaller();

        /** @var \Illuminate\Database\Eloquent\Collection $callersTasks */
        $callersTasks = $authUser->tasks()->get();

        //$this->lockManager->setRole('standard');
        //$this->lockManager->role('standard')->allow('standard', 'read', 'tasks');
        //$this->lockManager->role('user')->allow('create', 'tasks');

        //set permissions on all the tasks that belong to this user
        foreach($callersTasks as $task) {

            $this->lockManager
                ->caller($authUser)
                ->allow('read', 'tasks', (int) $task->getCallerId());
        }
    }
}