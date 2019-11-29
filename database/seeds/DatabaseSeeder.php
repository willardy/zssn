<?php

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
        $this->call(SurvivorsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(ReportTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
