<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DinnerTable extends Model
{
    use HasFactory;

    protected $table = 'dinnertables'; // Đổi tên bảng thành 'dinnertables'
    protected $primaryKey = 'id'; // Đặt tên primary key là 'id'
    protected $fillable = ['image', 'name', 'chair', 'branch_id']; // Sửa fillable

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id'); // Mối quan hệ nhiều-một
    }
}
