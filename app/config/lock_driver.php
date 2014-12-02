<?php

use \BeatSwitch\Lock\Drivers\ArrayDriver;
use \BeatSwitch\Lock\Lock;

// Instantiate the Lock instance with the static ArrayDriver.
$lock = new Lock(new User, new ArrayDriver);

// Set some permissions.
$lock->allow('manage_settings');
$lock->allow('create', 'events');

// Use the Lock instance to validate permissions on the given caller.
$lock->can('manage_settings'); // true: can manage settings
$lock->can('create', 'events'); // true: can create events
$lock->cannot('update', 'events'); // true: cannot update events
$lock->can('delete', 'events'); // false: cannot delete events