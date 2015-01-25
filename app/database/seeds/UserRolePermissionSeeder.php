<?php

use Illuminate\Database\Seeder;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
        //set up user 1
        $saturdayWorker = User::findOrFail(1);

        App::make('lock.manager')
           ->role('saturday_tps_report_specialist')
           ->allow('workOnSaturday', 'tps_report_generator');

        $saturdayTpsReportSpecialistRole = Role::where('name', '=', 'saturday_tps_report_specialist')->first();
        $saturdayWorker->roles()->save($saturdayTpsReportSpecialistRole);

        //set up user 2
        $sundayWorker = User::findOrFail(2);

        App::make('lock.manager')
           ->role('sunday_tps_report_specialist')
           ->allow('workOnSunday', 'tps_report_generator');

        $sundayTpsReportSpecialistRole = Role::where('name', '=', 'sunday_tps_report_specialist')->first();
        $sundayWorker->roles()->save($sundayTpsReportSpecialistRole);
    }
}
