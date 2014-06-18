<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(
			array(
				'username' => 'superadmin',
				'password' => Hash::make('password'),
				'email' => 'foo@bar.com',
				'is_active' => true,
				'is_superadmin' => true
			)
		);
	}

}