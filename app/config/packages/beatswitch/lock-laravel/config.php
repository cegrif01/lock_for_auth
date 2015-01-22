<?php

use BeatSwitch\Lock\Lock;
use BeatSwitch\Lock\Manager;
use BeatSwitch\Lock\Drivers\ArrayDriver;

return [

    'driver' => 'array',

    'user_caller_type' => 'users',

    'permissions' => function (Manager $lockManager, Lock $callerLock) {

        if ($lockManager->getDriver() instanceof ArrayDriver) {

            /** @var \BeatSwitch\Lock\Callers\Caller $callersTasks */
            $callersTasks = $callerLock->getCaller()->tasks()->get();

            //set permissions on all the tasks that belong to this user
            foreach($callersTasks as $task) {

                $lockManager
                    ->caller($callerLock->getCaller())
                    ->allow('read', 'tasks', (int) $task->getCallerId());
            }

        }
    },

    'table' => 'lock_permissions',
];
