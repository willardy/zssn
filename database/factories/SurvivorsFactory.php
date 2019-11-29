<?php

/** @var Factory $factory */

use App\Model;
use App\Survivor;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Survivor::class, function (Faker $faker) {
    $arrayValues = ['Male', 'Female'];

    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(10, 60),
        'gender' => $arrayValues[rand(0, 1)],
        'latitude' => $faker->randomFloat(),
        'longitude' => $faker->randomFloat(),
        'infected' => false
    ];
});
