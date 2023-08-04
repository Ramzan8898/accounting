<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\seeds\AdminSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);

    }
}
