<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('customer', function($t) {
            $t->increments('id');
            $t->string('first_name')->nullable();
            $t->string('last_name');
            $t->string('email');
            $t->string('address')->nullable();
            $t->string('address2')->nullable();
            $t->string('city')->nullable();
            $t->string('state', 2)->nullable();
            $t->string('zip', 10)->nullable();
            $t->string('phone', 25)->nullable();
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
        Schema::drop('customer');
	}

}