<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'=>'Digital Printing',
                'slug'=>'digital-printing',
                'icon'=>'bi bi-printer',
                'sort_order'=> 1,
            ],
            [
                'name'=>'Name Card',
                'slug'=>'name-card',
                'icon'=>'bi bi-person-badge',
                'sort_order'=> 2,
            ],
            [
                'name'=>'Sticker',
                'slug'=>'sticker',
                'icon'=>'bi bi-tag',
                'sort_order'=> 3,
            ],
            [
                'name'=>'Packaging',
                'slug'=>'packaging',
                'icon'=>'bi bi-box-seam',
                'sort_order'=> 4,
            ],
            [
                'name'=>'Stationary',
                'slug'=>'stationary',
                'icon'=>'bi bi-journal-bookmark',
                'sort_order'=> 5,
            ],
            [
                'name'=>'Merchandise',
                'slug'=>'merchandise',
                'icon'=>'bi bi-cup-hot',
                'sort_order'=> 6,
            ],
        ];

        foreach($categories as $cat){
            Category::updateOrCreate(['slug'=> $cat['slug']], $cat);
        }
    }
}
