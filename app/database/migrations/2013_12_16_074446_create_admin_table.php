<?php

use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('admin', function($t) {
            $t->increments('id');
            $t->integer('role_id')->nullable();
            $t->string('email');
            $t->string('password');
            $t->string('first_name');
            $t->string('last_name');
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
        Schema::drop('admin');
	}

}