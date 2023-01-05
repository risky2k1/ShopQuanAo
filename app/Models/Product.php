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
        'brand',
        'description',
        'intro_img',
    ];
    public function categoryz(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
