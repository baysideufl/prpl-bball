<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GamesTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();
		$date = new DateTime("2014-07-04 18:00:00");
		$cutoff = new DateTime("2014-07-04 16:00:00");

		DB::table('games')->delete();

		foreach(range(1, 10) as $index)
		{
			Game::create(
			array(
				'id' => $index,
				'title' => "Event $index",
				'location' => "Somewhere",
				'date' => $date,
				'min_to_play' => "2",
				'max_per_team' => "5",
				'cutoff_time' => $cutoff,
				'created_at' => new DateTime, 
				'updated_at' => new DateTime,
				'notification_sent' => "0"
				)
			);
			$date->add(new DateInterval('P1D'));
			$cutoff->add(new DateInterval('P1D'));
		}
	}

}