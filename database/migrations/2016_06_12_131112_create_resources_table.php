<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resources', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')
				  ->unsigned()
				  ->nullable();
			$table->integer('film_id')
				  ->unsigned()
				  ->nullable();

			// Constraints
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('set null');
			$table->foreign('film_id')
				  ->references('id')
				  ->on('films')
				  ->onDelete('set null');

			$table->string('name')->nullable();
			$table->text('description')->nullable();

			$table->string('url');
			$table->string('type');
			$table->string('mime')->nullable();
			$table->string('extension')->nullable();

			$table->softDeletes();
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
		Schema::dropIfExists('resources');
	}
}
