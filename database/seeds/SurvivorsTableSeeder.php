<?php

use App\Survivor;
use Illuminate\Database\Seeder;

class SurvivorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Survivor::class, 6)->create();
    }
}
