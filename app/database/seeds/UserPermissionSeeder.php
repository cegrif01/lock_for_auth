<?php

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    public function run()
    {
        $saturdayWorker = User::findOrFail(1);

        $saturdayPermission = Permission::create([
            'type'              => 'privilege',
            'action'            => 'workOnSaturday',
            'resource_type'     => 'tps_report_generator',
            'resource_id'       => null,
        ]);
        $saturdayWorker->permissions()->save($saturdayPermission);

        $sundayWorker = User::findOrFail(2);

        $sundayPermission = Permission::create([
            'type'              => 'privilege',
            'action'            => 'workOnSunday',
            'resource_type'     => 'tps_report_generator',
            'resource_id'       => null,
        ]);
        $sundayWorker->permissions()->save($sundayPermission);
    }
}
