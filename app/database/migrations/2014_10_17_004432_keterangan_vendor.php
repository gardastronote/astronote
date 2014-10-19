<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeteranganVendor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vendor_data',function($table){
			$table->string('alamat');
			$table->string('phone');
			$table->string('keterangan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vendor_data',function($table){
			$table->dropColumn('alamat');
			$table->dropColumn('phone');
			$table->dropColumn('keterangan');
		});
	}

}
