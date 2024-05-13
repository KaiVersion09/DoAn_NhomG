<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';

    protected $primaryKey = 'food_id';

    public $incrementing = true;
    protected $fillable = ['food_name', 'categories_id', 'food_price', 'food_description', 'food_avatar'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
