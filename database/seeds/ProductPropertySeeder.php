<?php

use Illuminate\Database\Seeder;

class ProductPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProductProperty::class, 1000)->create();
    }
}
