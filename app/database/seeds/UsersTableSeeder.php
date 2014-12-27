<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->truncate();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'password' => '$2y$10$1OGP/2nyYc5aq.UKkvB0cO4fVHabfLthGTAoHdf8Lgh2OhVTnmS/q',
				'remember_token' => '',
				'role' => 'admin',
				'username' => 'master',
			),
		));
	}

}
