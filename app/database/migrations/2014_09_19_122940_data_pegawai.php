<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPegawai extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('pegawai_grade',function($table){
			$table->increments('id');
			$table->string('grade');
		});

		Schema::create('pegawai_title',function($table){
			$table->increments('id');
			$table->string('title');
		});

		Schema::create('pegawai_job',function($table){
			$table->increments('id');
			$table->string('job');
		});

		Schema::create('pegawai_unit',function($table){
			$table->increments('id');
			$table->string('unit');
		});

		Schema::create('pegawai_penempatan',function($table){
			$table->increments('id');
			$table->string('penempatan');
		});

		Schema::create('pegawai_jenis',function($table){
			$table->increments('id');
			$table->string('jenis');
		});
		Schema::create('pegawai_data',function($table){
			$table->increments('id');
			$table->string('nip',64)->unique();
			$table->string('nama',64);
			$table->integer('id_grade')->unsigned();
			$table->integer('id_title')->unsigned();
			$table->integer('id_job')->unsigned();
			$table->integer('id_unit')->unsigned();
			$table->integer('id_penempatan')->unsigned();
			$table->integer('id_jenis')->unsigned();
			$table->foreign('id_grade')->references('id')->on('pegawai_grade')->onDelete('cascade');
			$table->foreign('id_title')->references('id')->on('pegawai_title')->onDelete('cascade');
			$table->foreign('id_unit')->references('id')->on('pegawai_unit')->onDelete('cascade');
			$table->foreign('id_job')->references('id')->on('pegawai_job')->onDelete('cascade');
			$table->foreign('id_penempatan')->references('id')->on('pegawai_penempatan')->onDelete('cascade');
			$table->foreign('id_jenis')->references('id')->on('pegawai_jenis')->onDelete('cascade');
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
		Schema::dropIfExists('pegawai_data');
		Schema::dropIfExists('pegawai_grade');
		Schema::dropIfExists('pegawai_title');
		Schema::dropIfExists('pegawai_job');
		Schema::dropIfExists('pegawai_unit');
		Schema::dropIfExists('pegawai_penempatan');
		Schema::dropIfExists('pegawai_jenis');
	}

}
