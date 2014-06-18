<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('systems', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('mac_address');
			$table->boolean('pending')->default(true);
			$table->boolean('non_blocking')->default(false);
			
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('systems');
	}

}
