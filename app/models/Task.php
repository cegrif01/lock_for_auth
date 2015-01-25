<?php

use BeatSwitch\Lock\Callers\Caller;

class Task extends Eloquent implements Caller
{

    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    public function getCallerType()
    {
        return 'tasks';
    }

    public function getCallerId()
    {
        return $this->id;
    }

    public function getCallerRoles()
    {
        return [];
    }
}