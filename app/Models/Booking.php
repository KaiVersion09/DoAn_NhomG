<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'user_booking';

    use HasFactory;

    protected $fillable = [
        'branches_id', // Thêm cột branches_id vào đây
        'table_id',
        'booking_time',
        'number_of_guests',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dinnerTable()
    {
        return $this->hasOne(DinnerTable::class);
    }
}
