<?php

namespace App\Models;

use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;

    protected $table = 'branches';
    protected $primaryKey = 'branches_id';

    public $incrementing = true;
    protected $fillable = ['branches_name', 'branches_phone', 'branches_address'];

}
