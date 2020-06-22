<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductProperty;
use App\Product;
use App\Property;
use Faker\Generator as Faker;

$factory->define(ProductProperty::class, function (Faker $faker) {
    $property = Property::orderByRaw('RAND()')->first();
    $product = Product::orderByRaw('RAND()')->first();
    $value = '';
    switch ($property['type']) {
        case 'array':
        case 'string':
            $value = $faker->word;
            break;
        case 'integer':
            $value = $faker->randomDigit;
            break;
    }
    return [
        'product_id' => $product['id'],
        'property_id' => $property['id'],
        'value' => $value,
    ];
});
