<?php

namespace Database\Seeders;

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
        $this->call(PartSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(EmployeeSeeder::class);
    }
}
