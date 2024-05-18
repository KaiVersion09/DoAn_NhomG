<?php

namespace App\Models;

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
        'branch_id', // Thêm cột branch_id vào fillable để có thể gán giá trị cho nó
    ];

    protected $hidden = [
        'password', // Giấu trường mật khẩu
        'remember_token', // Giấu trường remember token
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}

