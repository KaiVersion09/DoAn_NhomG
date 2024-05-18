<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notifications')->insert([
            [
                'notifications_content' => 'Your order has been shipped',
                'notifications_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notifications_content' => 'New message received',
                'notifications_time' => now()->subHours(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notifications_content' => 'Your password has been changed',
                'notifications_time' => now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notifications_content' => 'Your subscription is about to expire',
                'notifications_time' => now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notifications_content' => 'You have a new follower',
                'notifications_time' => now()->subWeeks(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
