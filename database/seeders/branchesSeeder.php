<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'branches_name' => 'Branch 1',
                'branches_phone' => '091233123',
                'branches_address' => '123 Main St, Anytown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 2',
                'branches_phone' => '09123312',
                'branches_address' => '456 Elm St, Othertown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 3',
                'branches_phone' => '0001231',
                'branches_address' => '789 Oak St, Sometown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 4',
                'branches_phone' => '521512',
                'branches_address' => '101 Pine St, Anycity, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 5',
                'branches_phone' => '4534534',
                'branches_address' => '202 Maple St, Everytown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 6',
                'branches_phone' => '5474574',
                'branches_address' => '303 Birc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 7',
                'branches_phone' => '58455444',
                'branches_address' => '404 Cedar St, Anyplace, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 8',
                'branches_phone' => '6846346',
                'branches_address' => '505 Fir St, Anyburg, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 9',
                'branches_phone' => '2352362',
                'branches_address' => '606 Spruce St, Anyport, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'branches_name' => 'Branch 10',
                'branches_phone' => '345345',
                'branches_address' => '707 Willow St, Anycity, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
