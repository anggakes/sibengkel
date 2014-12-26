<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipemotorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipemotor', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('kategori_id')->unsigned();
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
		Schema::drop('tipemotor');
	}

}
