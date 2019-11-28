<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'description' => 'Water',
            'points' => 4
        ]);
        Item::create([
            'description' => 'Food',
            'points' => 3
        ]);
        Item::create([
            'description' => 'Medication',
            'points' => 2
        ]);
        Item::create([
            'description' => 'Ammunition',
            'points' => 1
        ]);
    }
}
