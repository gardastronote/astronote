<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempatVendor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vendor_kegiatan',function($table){
			$table->dropColumn('tanggal');
		});
		Schema::table('vendor_kegiatan',function($table){
			$table->string('tanggal');
			$table->string('tempat');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vendor_kegiatan',function($table){
			$table->dropColumn('tanggal');
		});

		Schema::table('vendor_kegiatan',function($table){
			$table->date('tanggal');
		});
	}

}
