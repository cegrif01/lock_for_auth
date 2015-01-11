<?php

use DB;
use LockPermission;
use Illuminate\Database\Seeder;

class AuthSetupSeeder extends Seeder
{
    public function run()
    {
        DB::table('lock_permissions')->insert([

            //$this->lockManager->caller($this->callerLock->getCaller())->allow('all');
            //$this->callerLock->getCaller() = currently logged in user in my case
            //the caller_id would be 1 because that's the user I was logged in as.
            //this is what all looks like it overrides everything.  Having this entry in here will
            //allow user with id of 1 to do anything they damn well pleased, no matter what
            //other lock_permissions I have in place.
            [
                'caller_type'       => 'users',
                'caller_id'         => 1,
                'role'              => '',
                'type'              => 'privilege',
                'action'            => 'all',
                'resource_type'     => null,
                'resource_id'       => null,
            ],

            //$this->lockManager->role('guest')->allow('guest', 'read');
            //this is how to create a role called "guest" that's allowed to read everything
            [
                'caller_type'       => null,
                'caller_id'         => null,
                'role'              => 'guest',
                'type'              => 'privilege',
                'action'            => 'guest',
                'resource_type'     => 'read',
                'resource_id'       => null,
            ],

            //$this->lockManager->role('user')->allow('create', 'posts');
            //allow user role to create posts
            [
                'caller_type'       => null,
                'caller_id'         => null,
                'role'              => 'user',
                'type'              => 'privilege',
                'action'            => 'create',
                'resource_type'     => 'posts',
                'resource_id'       => null,
            ]
        ]);
    }

} 