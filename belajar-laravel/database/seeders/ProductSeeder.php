<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // kategori dicari lewat slug (bukan id angka) supaya tidak salah kategori
        $products = [
            [
                'category_slug' => 'name-card',
                'name' => 'Kartu Nama Glossy',
                'slug' => 'kartu-nama-glossy',
                'price' => 15000,
                'brief_description' => 'Kartu nama dengan laminasi glossy.',
            ],
            [
                'category_slug' => 'sticker',
                'name' => 'Cutting Sticker',
                'slug' => 'cutting-sticker',
                'price' => 25000,
                'cutting_price' => 5000,
                'brief_description' => 'Sticker potong sesuai bentuk desain.',
            ],
        ];

        foreach ($products as $item) {
            $categorySlug = $item['category_slug'];
            unset($item['category_slug']);

            Product::updateOrCreate(
                ['slug' => $item['slug']],
                $item + ['category_id' => Category::where('slug', $categorySlug)->value('id')]
            );
        }
    }
}
