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
        for ($i = 0; $i < 2000; $i++) {
            factory(\App\ProductProperty::class)->create();
        }
    }
}
