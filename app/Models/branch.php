<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';
    protected $primaryKey = 'id'; // Chỉnh sửa tên cột primary key thành 'id'
    protected $fillable = ['branches_name', 'branches_phone', 'branches_address'];

    public function dinnerTables()
    {
        return $this->hasMany(DinnerTable::class, 'branch_id', 'id'); // Mối quan hệ một-nhiều
    }
    public function staff()
    {
        return $this->hasMany(Staff::class, 'branch_id', 'id');
    }
}
