<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'TV', 'price' => 50.00, 'quantity' => 10, 'category_id' => 1],
            ['name' => 'Jacket', 'price' => 100.00, 'quantity' => 20, 'category_id' => 2],
            ['name' => 'T-Shirt', 'price' => 150.00, 'quantity' => 15, 'category_id' => 3],
        ]);
    }
}
