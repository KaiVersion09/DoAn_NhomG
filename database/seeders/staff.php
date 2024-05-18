<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class staff extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => now(),
                'phone' => '0234567890',
                'wage' => '50000',
                'password' => Hash::make('password123'),
                'avatar' => 'avatars/johndoe.png',
                'branch_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'email_verified_at' => now(),
                'phone' => '0235567890',
                'wage' => '55000',
                'password' => Hash::make('password123'),
                'avatar' => 'avatars/janesmith.png',
                'branch_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more staff members here
        ]);
    }
}
