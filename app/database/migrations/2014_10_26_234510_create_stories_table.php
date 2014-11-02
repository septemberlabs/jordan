<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->text('introduction')->nullable();
            $table->float('latitude')->default(0.00);
            $table->float('longitude')->default(0.00);
            $table->string('primary_image_url')->nullable();
            $table->string('source_url')->nullable();
            $table->string('title')->nullable();
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
		Schema::drop('stories');
	}

}
