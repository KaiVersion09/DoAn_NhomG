<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'categories_id';

    public $incrementing = true;

    protected $fillable = ['categories_name', 'categories_description'];

    public function food(): HasMany
    {
        return $this->hasMany(Food::class);
    }
}
