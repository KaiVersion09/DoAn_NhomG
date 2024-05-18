<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class news extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dữ liệu mẫu cho các tin tức
        $news = [
            [
                'title' => 'Tiêu đề tin tức 1',
                'content' => 'Nội dung tin tức số 1.',
                'image' => 'news1.jpg', // Nếu bạn có hình ảnh minh họa
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tiêu đề tin tức 2',
                'content' => 'Nội dung tin tức số 2.',
                'image' => 'news2.jpg', // Nếu bạn có hình ảnh minh họa
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm dữ liệu cho các tin tức khác nếu cần
        ];

        // Chèn dữ liệu vào bảng 'news'
        DB::table('news')->insert($news);
    }
}
