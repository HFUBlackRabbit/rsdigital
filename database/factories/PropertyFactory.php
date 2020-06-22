<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->realText($faker->numberBetween(10, 20), $faker->numberBetween(1, 5)),
        'type' => $faker->randomElement(['string', 'integer', 'array'])
    ];
});
