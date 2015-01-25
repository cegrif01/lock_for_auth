<?php

use Illuminate\Database\Seeder;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
        //set up user 1
        $user1 = User::findOrFail(1);
        App::make('lock.manager')
            ->role('admin')
            ->allow('readAll', 'tasks');

        $role1 = Role::where('name', '=', 'admin')->first();
        $user1->roles()->save($role1);

        //set up user 2
        $user2 = User::findOrFail(2);
        foreach($user2->tasks()->get() as $task) {

            App::make('lock.manager')
                ->caller($user2)
                ->allow('readOwn', 'tasks', $task->id);
        }
    }
}
