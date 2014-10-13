<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPelatihan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('pelatihan_jabatan');
		Schema::dropIfExists('pelatihan_pelatihan');
		Schema::dropIfExists('pelatihan_data');
		Schema::create('pelatihan_jabatan',function($table){
			$table->increments('id');
			$table->string('jabatan');
		});

		Schema::create('pelatihan_pelatihan',function($table){
			$table->increments('id');
			$table->string('pelatihan');
		});
		Schema::create('pelatihan_data',function($table){
			$table->increments('id');
			$table->integer('id_pegawai')->unsigned();
			$table->integer('id_jabatan')->unsigned();
			$table->integer('id_pelatihan')->unsigned();
			$table->integer('tanggal');
			$table->integer('lama');
			$table->integer('tahun');
			$table->string('tempat');
			$table->string('no_surat_penugasan')->nullable();
			$table->string('lulus')->nullable();
			$table->integer('score')->nullable();
			$table->timestamps();
			$table->foreign('id_pelatihan')->references('id')->on('pelatihan_pelatihan')->onDelete('cascade');
			$table->foreign('id_jabatan')->references('id')->on('pelatihan_jabatan')->onDelete('cascade');
			$table->foreign('id_pegawai')->references('id')->on('pegawai_data')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pelatihan_jabatan');
		Schema::dropIfExists('pelatihan_pelatihan');
		Schema::dropIfExists('pelatihan_data');
	}

}
