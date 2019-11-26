<?php

use App\Survivor;
use Illuminate\Database\Seeder;

class SurvivorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.s
     *
     * @return void
     */
    public function run()
    {
        factory(Survivor::class, 20)->create();
    }
}
