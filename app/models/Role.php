<?php

class Role extends Eloquent
{
	public function users()
    {
        return $this->morphedByMany('User', 'caller', 'roleables');
    }

    public function permissions()
    {
        return $this->belongsToMany('Permission');
    }
}