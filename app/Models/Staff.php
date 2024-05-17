<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'wage',
        'avatar',
        // Thêm các trường khác nếu cần
    ];

    protected $hidden = [
        'password', // Giấu trường mật khẩu
        'remember_token', // Giấu trường remember token
    ];

}
