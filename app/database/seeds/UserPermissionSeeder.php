<?php

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    public function run()
    {
        $user = User::findOrFail(1);
        $permission1 = Permission::create([
            'id'                => 1,
            'type'              => 'privilege',
            'action'            => 'read',
            'resource_type'     => 'tasks',
            'resource_id'       => 1,
        ]);
        $user->permissions()->save($permission1);

        $permission2 = Permission::create([
            'id'                => 2,
            'type'              => 'privilege',
            'action'            => 'read',
            'resource_type'     => 'tasks',
            'resource_id'       => 4,
        ]);
        $user->permissions()->save($permission2);

        $user2 = User::findOrFail(2);
        $permission3 = Permission::create([
            'id'                => 3,
            'type'              => 'privilege',
            'action'            => 'read',
            'resource_type'     => 'tasks',
            'resource_id'       => 2,
        ]);
        $user2->permissions()->save($permission3);

        $permission4 = Permission::create([
            'id'                => 4,
            'type'              => 'privilege',
            'action'            => 'read',
            'resource_type'     => 'tasks',
            'resource_id'       => 3,
        ]);
        $user2->permissions()->save($permission4);
    }

} 