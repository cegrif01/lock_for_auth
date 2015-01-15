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

        $this->call('TaskTableSeeder');

        //$this->call('UserPermissionSeeder');

        $this->call('UserRolePermissionSeeder');

        //$this->call('PermissionRoleSeeder');
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

class TaskTableSeeder extends Seeder
{
    public function run()
    {
        Task::create(['user_id' => 1, 'body' => 'sweep the floor']);
        Task::create(['user_id' => 2, 'body' => 'feed the dog']);
        Task::create(['user_id' => 2, 'body' => 'buy wife flowers']);
        Task::create(['user_id' => 1, 'body' => 'groom the dog']);
    }
}
