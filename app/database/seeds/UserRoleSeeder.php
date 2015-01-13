<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $user = User::findOrFail(2);

        $role = Role::create([
            'name'  => 'admin'
        ]);

        $user->roles()->save($role);
    }

}