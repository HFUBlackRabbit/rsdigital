<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductProperty;
use App\Product;
use App\Property;
use Faker\Generator as Faker;

$factory->define(ProductProperty::class, function (Faker $faker) {
    $property = Property::orderByRaw('RAND()')->first();
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
    $product = Product::whereDoesntHave('properties', function ($query) use ($value, $property) {
        $query->where('property_id', $property['id']);
        if ($property['type'] === 'array') {
            $query->where('value', $value);
        }
    })
        ->orderByRaw('RAND()')->first();
    return [
        'product_id' => $product['id'],
        'property_id' => $property['id'],
        'value' => $value,
    ];
});
