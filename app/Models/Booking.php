<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'user_booking';

    protected $fillable = [
        'user_id',
        'branch_id', // Thay branches_id thành branch_id để phản ánh đúng tên cột trong cơ sở dữ liệu
        'dinner_table_id',
        'booking_time',
        'number_of_guests',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dinnerTable(): BelongsTo
    {
        return $this->belongsTo(DinnerTable::class, 'dinner_table_id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id'); // Sửa 'branches_id' thành 'branch_id'
    }
}
