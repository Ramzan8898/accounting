<?php

use Illuminate\Database\Seeder;
use DB;
use Str;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'name' => 'Ramzan',
    		'email' => 'ramzan@gmail.com',
    		'password' => Hash::make('12345678'),
    	]);
    }
}
