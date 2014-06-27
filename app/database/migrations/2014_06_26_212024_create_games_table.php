<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('location');
			$table->dateTime('date');
			$table->integer('min_to_play');
			$table->integer('max_per_team');
			$table->dateTime('cutoff_time');
			$table->boolean('notification_sent')->default('0');
			$table->timestamps();
		});

		Schema::create('attendees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('game_id')->unsigned();
			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->string('name');
			$table->string('email');
			$table->integer('phone')->unsigned();
			$table->string('carrier');
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
		Schema::drop('attendees');
		Schema::drop('games');
	}

}
