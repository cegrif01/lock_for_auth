<?php

use BeatSwitch\Lock\Lock;
use BeatSwitch\Lock\Manager;

return [

    'driver' => 'array',

    'user_caller_type' => 'users',

    'permissions' => function (Manager $manager, Lock $caller) {

    },

    'table' => 'lock_permissions',
];
