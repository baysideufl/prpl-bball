<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AttendeesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('attendees')->delete();

		foreach(range(1, 30) as $index)
		{
			$id =	rand(1,10);
			Attendee::create(
			array(
				'id' => $index,
				'game_id' => $id,
				'name' => "Attendee $index",
				'email' => "member@example.com",
				'phone' => "5555555555",
				'carrier' => "verizon",
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
				)
			);
		}
	}

}