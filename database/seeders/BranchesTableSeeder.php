<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'branches_name' => 'Main Branch',
                'branches_phone' => '1234567890',
                'branches_address' => '123 Main St',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Secondary Branch',
                'branches_phone' => '9876543210',
                'branches_address' => '456 Secondary St',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more branches here if needed
        ]);
    }
}
