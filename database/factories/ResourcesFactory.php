<?php

/** @var Factory $factory */

use App\Model;
use App\Resource;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Resource::class, function (Faker $faker) {
    return [
        'survivor_id' => $faker->unique()->numberBetween(4, 6),
        'item_id' => $faker->numberBetween(1, 4),
        'quantity' => $faker->numberBetween(1, 2)
    ];
});
