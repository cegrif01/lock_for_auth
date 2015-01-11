<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallerRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('caller_role', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('caller_type', 100);
			$table->integer('caller_id', 11);
			$table->integer('role_id', 11);
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('caller_role');
	}

}
