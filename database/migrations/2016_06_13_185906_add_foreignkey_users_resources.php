<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyUsersResources extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {

			$table->integer('resource_id')
				  ->unsigned()
				  ->nullable();

			$table->foreign('resource_id')
				  ->references('id')
				  ->on('resources')
				  ->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_resource_id_foreign');
		});
	}
}
