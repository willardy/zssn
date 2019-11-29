<?php

use App\Resource;
use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Resource::class, 3)->create();

        Resource::create([
            'quantity' => 1,
            'survivor_id' => 1,
            'item_id' => 1,
        ]);

        Resource::create([
            'quantity' => 2,
            'survivor_id' => 1,
            'item_id' => 4,
        ]);

        Resource::create([
            'quantity' => 6,
            'survivor_id' => 2,
            'item_id' => 4,
        ]);

        Resource::create([
            'quantity' => 1,
            'survivor_id' => 3,
            'item_id' => 2,
        ]);

        Resource::create([
            'quantity' => 1,
            'survivor_id' => 3,
            'item_id' => 3,
        ]);

        Resource::create([
            'quantity' => 1,
            'survivor_id' => 3,
            'item_id' => 4,
        ]);

    }
}
