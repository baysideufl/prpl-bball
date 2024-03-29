<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('GamesTableSeeder');
		$this->call('AttendeesTableSeeder');

		$this->command->info('Games Table Seeded!');
		$this->command->info('Attendees Table Seeded!');
	}

}
