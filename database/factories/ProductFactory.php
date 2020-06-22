<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->shuffle($faker->realText($faker->numberBetween(10,20), $faker->numberBetween(1 ,5))),
        'qtty' => $faker->randomDigit,
        'price' => $faker->randomNumber(2)
    ];
});
