<?php

class Role extends Eloquent
{

	public function users()
    {
        return $this->morphedByMany('User', 'roleable');
    }

    public function permissions()
    {
        return $this->belongsToMany('Permission');
    }
}