<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleablesTable extends Migration {

	public function up()
	{
		Schema::create('roleables', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('role_id')->unsigned()->index();
            $table->string('caller_type', 100);
            $table->integer('caller_id')->unsigned()->index();

            $table->foreign('role_id')->references('id')->on('roles');
		});
	}

	public function down()
	{
		Schema::drop('roleables');
	}
}
