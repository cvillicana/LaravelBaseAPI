<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::truncate();

    	$faker = $faker = \Faker\Factory::create();

    	$password = Hash::make('fakepassword');

    	User::create([
    		'name' => 'Admin',
    		'email' => 'admin@test.com',
    		'password' => $password
    	]);

    	for($i = 0; $i < 10; $i++) {
    		User::create([
    			'name' => $faker->name,
    			'email' => $faker->email,
    			'password' => $password
    		]);
    	}   
    }
}
