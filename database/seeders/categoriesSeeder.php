<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'categories_name' => 'Electronics',
                'categories_description' => 'Devices and gadgets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Books',
                'categories_description' => 'Printed and electronic books',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Clothing',
                'categories_description' => 'Men and women apparel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Home & Kitchen',
                'categories_description' => 'Furniture and kitchen supplies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Sports',
                'categories_description' => 'Sporting goods and outdoor equipment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Beauty',
                'categories_description' => 'Beauty and personal care products',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
