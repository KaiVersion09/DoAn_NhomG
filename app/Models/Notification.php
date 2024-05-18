<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    protected $primaryKey = 'notifications_id';

    public $incrementing = true;

    protected $fillable = ['notifications_content', 'notifications_time'];

}
