<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 60)->index();
            $table->string('password', 100)->index();
            $table->timestamps();
        });
	}

	public function down()
	{
        Schema::drop('users');
	}
}
