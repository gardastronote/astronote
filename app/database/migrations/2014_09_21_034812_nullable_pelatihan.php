<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullablePelatihan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Pelatihan_data',function($table){
			$table->dropForeign('pelatihan_data_id_jabatan_foreign');
			$table->dropColumn('id_jabatan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Pelatihan_data',function($table){
			$table->integer('id_jabatan')->unsigned();
			$table->foreign('id_jabatan')->references('id')->on('Pelatihan_jabatan')->onDelete('cascade');
		});
	}

}
