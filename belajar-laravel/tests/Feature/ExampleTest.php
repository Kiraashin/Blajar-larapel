<?php

use App\Models\Category;
use App\Models\Product;

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('halaman depan menampilkan kategori dan produk dari database', function () {
    $category = Category::create(['name' => 'Kategori Uji Coba', 'slug' => 'kategori-uji-coba', 'icon' => 'bi bi-tag']);
    Product::create(['category_id' => $category->id, 'name' => 'Produk Uji Coba', 'price' => 12500]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Kategori Uji Coba')
        ->assertSee(route('catalog.category', $category->slug))
        ->assertSee(route('catalog.index'))
        ->assertSee('Produk Uji Coba')
        ->assertSee('Rp 12.500');
});

test('katalog menampilkan produk dari database dan bisa difilter berdasarkan kategori', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);
    Product::create(['category_id' => $category->id, 'name' => 'Sticker Vinyl', 'price' => 15000]);

    $this->get(route('catalog.index'))
        ->assertOk()
        ->assertSee('Sticker Vinyl')
        ->assertSee(route('catalog.category', $category->slug));

    $this->get(route('catalog.category', $category->slug))
        ->assertOk()
        ->assertSee('Sticker Vinyl');
});

test('katalog mengembalikan halaman tidak ditemukan untuk kategori yang tidak ada', function () {
    $this->get(route('catalog.category', 'kategori-tidak-ada'))->assertNotFound();
});
