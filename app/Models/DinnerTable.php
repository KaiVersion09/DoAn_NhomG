<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DinnerTable extends Model
{
    use HasFactory;

    // Khai báo tên bảng nếu khác với tên model chuẩn
    protected $table = 'dinnertable';
    
    protected $fillable = [
        'image',
        'name',
        'chair',
    ];
}
