<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => $faker->randomElement(['string', 'integer', 'array'])
    ];
});
