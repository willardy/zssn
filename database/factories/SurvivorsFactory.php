<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Survivor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age'  => $faker->randomNumber(),
        'gender' => $faker->text,
        'latitude' => $faker->randomFloat(),
        'longitude' => $faker->randomFloat(),
        'infected' => $faker->boolean
    ];
});
