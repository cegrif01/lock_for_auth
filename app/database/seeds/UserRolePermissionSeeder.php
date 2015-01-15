<?php

use Illuminate\Database\Seeder;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
        //set up user 1
        $user1 = User::findOrFail(1);

        App::make('lock.manager')->role('admin')->allow('readAll', 'tasks');
        $role1 = Role::where('name', '=', 'admin')->first();
        $user1->roles()->save($role1);
        $user1->permissions()->save(Permission::find(1));


        //set up user 2
        $user2 = User::findOrFail(2);

        App::make('lock.manager')->role('standard')->allow('readOwn', 'tasks');
        $role2 = Role::where('name', '=', 'standard')->first();
        $user2->roles()->save($role2);
        $user2->permissions()->save(Permission::find(2));
    }

}