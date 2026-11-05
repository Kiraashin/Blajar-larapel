<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'slug',
        'price',
        'price_art_cartoon',
        'price_art_paper',
        'price_hvs',
        'price_doft',
        'price_glossy',
        'cutting_price',
        'brief_description',
        'description',
    ];

    // many to one => banyak product ke satu category (belongsTo)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
