<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tanggalubah extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pelatihan_data',function($table){
			$table->dropColumn('tanggal');
		});
		Schema::table('pelatihan_data',function($table){
			$table->string('tanggal');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pelatihan_data',function($table){
			$table->dropColumn('tanggal');
		});
		Schema::table('pelatihan_data',function($table){
			$table->integer('tanggal');
		});
	}

}
