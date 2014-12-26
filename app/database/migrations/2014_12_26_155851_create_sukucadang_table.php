<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSukucadangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sukucadang', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('kode_suku_cadang')->unique();
			$table->string('nama');
			$table->integer('lead_time');
			$table->integer('biaya_pesan');
			$table->integer('biaya_simpan');
			$table->integer('safety_stock');
			$table->integer('eoq');
			$table->integer('rop');
			$table->integer('harga');
			$table->enum('status',['proses_pesan','siap']);
			$table->integer('kategori_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sukucadang');
	}

}
