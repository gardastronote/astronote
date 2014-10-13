<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jkelamin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pegawai_data',function($table){
			$jkelamin = array('L','P');
			$table->enum('jkelamin',$jkelamin);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pegawai_data',function($table){
			$table->dropColumn('jkelamin');
		});
	}

}
