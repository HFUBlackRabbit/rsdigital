<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Property::class, 200)->create();
        factory(\App\Product::class, 200)->create();
        factory(\App\ProductProperty::class, 2000)->create();
    }
}
