<?php

class Role extends Eloquent
{

	public function users()
    {
        return $this->morphedByMany('User', 'roleable');
    }
}