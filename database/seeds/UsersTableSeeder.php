<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        User::create([
        	'name'=>'elchico',
        	'email'=>'terry@papu.com',
        	'password'=> bcrypt('elpapu')
        	]);
		*/
        factory(User::class,5)->create();
    }
}
