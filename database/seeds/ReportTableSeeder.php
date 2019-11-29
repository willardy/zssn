<?php

use App\Report;
use Illuminate\Database\Seeder;

class ReportTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Report::create([
            'survivor_reporter_id' => 1,
            'survivor_infected_id' => 2
        ]);
    }
}
