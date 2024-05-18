<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Dữ liệu mẫu cho người dùng
         $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'avatar' => 'avatar1.jpg', // Nếu bạn có hình ảnh avatar
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password456'),
                'avatar' => 'avatar2.jpg', // Nếu bạn có hình ảnh avatar
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm dữ liệu cho người dùng khác nếu cần
        ];

        // Chèn dữ liệu vào bảng 'users'
        DB::table('users')->insert($users);
    }
}
