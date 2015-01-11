<?php

class Permission extends Eloquent
{
	public function roles()
    {
        return $this->belongsToMany('Role');
    }

    public function users()
    {
        return $this->morphedByMany('User', 'permissionable');
    }
}