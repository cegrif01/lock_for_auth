<?php

use BeatSwitch\Lock\LockAware;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use BeatSwitch\Lock\Callers\Caller;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface, Caller
{
    use UserTrait, RemindableTrait, LockAware;

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

    public function tasks()
    {
        return $this->hasMany('Task');
    }

    public function roles()
    {
        return $this->morphToMany('Role', 'caller', 'roleables');
    }

    public function permissions()
    {
        return $this->morphToMany('Permission', 'caller', 'permissionables');
    }

    public function getCallerType()
    {
        return 'User';
    }

    public function getCallerId()
    {
        return $this->id;
    }

    public function getCallerRoles()
    {
        return $this->roles()->get()->fetch('name')->toArray();
    }
}
