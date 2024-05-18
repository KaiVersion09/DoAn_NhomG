<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class dinnertable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dữ liệu mẫu cho các bàn ăn
        $dinnerTables = [
            [
                'name' => 'Bàn 1',
                'image' => 'table1.jpg',
                'chair' => 4,
                'branch_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bàn 2',
                'image' => 'table2.jpg',
                'chair' => 6,
                'branch_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bàn 3',
                'image' => 'table3.jpg',
                'chair' => 8,
                'branch_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm dữ liệu cho các bàn khác nếu cần
        ];

        // Chèn dữ liệu vào bảng 'dinnertables'
        DB::table('dinnertables')->insert($dinnerTables);
    }
}
