<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorimotorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kategorimotor', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('nama');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kategorimotor', function(Blueprint $table)
		{
			//
		});
	}

}
