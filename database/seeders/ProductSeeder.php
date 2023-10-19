<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            ['name' => 'Mobile', 'unit_price' => 40000],
            ['name' => 'Laptop', 'unit_price' => 80000]
        ]);
    }
}
