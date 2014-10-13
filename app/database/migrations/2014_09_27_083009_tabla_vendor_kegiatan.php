<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaVendorKegiatan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendor_data',function($table){
			$table->increments('id');
			$jenis = array('hotel','pelatihan','catering');
			$table->enum('jenis',$jenis);
			$table->string('nama',128)->unique();
		});

		Schema::create('vendor_kegiatan',function($table){
			$table->increments('id');
			$table->integer('id_vendor')->unsigned();
			$table->foreign('id_vendor')->references('id')->on('vendor_data')->onDelete('cascade');
			$table->string('kegiatan',255);
			$table->float('nilai');
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
		Schema::dropIfExists('vendor_kegiatan');
		Schema::dropIfExists('vendor_data');
	}

}
