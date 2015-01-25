<?php

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');

        $this->call('UserRolePermissionSeeder');
	}
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(['email' => 'cegrif01@gmail.com',   'password' => Hash::make('secret')]);
        User::create(['email' => 'test_email@gmail.com', 'password' => Hash::make('secret')]);
    }
}

