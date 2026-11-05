<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'icon', 'sort_order'];

    // satu kategori punya banyak produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
