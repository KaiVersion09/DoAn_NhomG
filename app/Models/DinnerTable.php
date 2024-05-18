<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DinnerTable extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'dinnertables'; // Đổi tên bảng thành 'dinnertables'
    protected $primaryKey = 'id'; // Đặt tên primary key là 'id'
    protected $fillable = ['image', 'name', 'chair', 'branch_id']; // Sửa fillable

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id'); // Mối quan hệ nhiều-một
=======
    // Khai báo tên bảng nếu khác với tên model chuẩn
    protected $table = 'dinnertable';
    
    protected $fillable = [
        'image',
        'name',
        'chair',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
>>>>>>> datban
    }
}
