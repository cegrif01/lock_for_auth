<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use BeatSwitch\Lock\Contracts\Caller;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface, Caller {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public function getCallerType()
    {
        return 'users';
    }

    public function getCallerId()
    {
        return $this->id;
    }

    public function getCallerRoles()
    {
        return ['editor', 'publisher'];
    }
}
