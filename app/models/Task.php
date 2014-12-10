<?php

use BeatSwitch\Lock\Callers\Caller;

class Task extends Eloquent implements Caller
{

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
        return ['editor', 'publisher'];
    }
}