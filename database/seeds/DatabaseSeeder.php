<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {

		// Ask for db migration refresh, default no
		if ($this->command->confirm('Do you want to refresh (migrate:refresh) the database before seeding?')) {
		
			// artisan migrate:refresh
			$this->command->call('migrate:refresh');
			$this->command->warn("Database reset. Seeding...");

		}

		$this->call([
			PermissionsTableSeeder::class,
			RolesTableSeeder::class,
			UsersTableSeeder::class
		]);

		$this->command->info('You can now login as a Superuser with Login: super@email.com Password: secret');
    }
}
