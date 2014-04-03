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

		User::create(array(
			'login'		=> 'heycraft',
			'email'		=> 'aurelien.doignon@gmail.com',
			'group'		=> 'admin',
			'password'	=> Hash::make('password'),
		));
	}

}