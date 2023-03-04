<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'importPrice',
        'sellPrice',
        'description',
        'category_id',
        'brand_id',
        'intro_img',
        'img',

    ];
    public function categoryz(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class,'product_id','id');
    }
}
