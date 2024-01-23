<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'photo',
        'description',
        'price',
        'category_id',
        'stock',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function troli() {
        return $this->hasMany(Troli::class);
    }
}


