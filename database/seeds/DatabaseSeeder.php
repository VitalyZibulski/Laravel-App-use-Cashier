<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

		//clear current tables
		DB::table('users')->delete();
		DB::table('posts')->delete();

		//seed posts
		factory(App\Post::class,8)->create();

		//create a user can login
		User::create([
			'name' => 'Antony',
			'email' => 'antony@mail.com',
			'password' => bcrypt('password')
		]);
    }
}
