<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user', function($t) {
            $t->increments('id');
            $t->string('email');
            $t->string('password');
            $t->string('first_name');
            $t->string('last_name');
            $t->string('reset_key')->nullable();
            $t->integer('logins')->default(0);
            $t->integer('login_attempts')->default(0);
            $t->dateTime('last_login')->nullable();
            $t->boolean('active')->default(1);
            $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('user');
	}

}