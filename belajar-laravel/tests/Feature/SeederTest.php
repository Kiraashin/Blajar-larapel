<?php

use App\Models\Product;
use App\Models\Setting;
use App\Models\User;

test('seeder bisa dijalankan berulang kali tanpa error dan data tidak dobel', function () {
    $this->seed();
    $this->seed();

    expect(User::count())->toBe(1);
    expect(Product::count())->toBe(2);
    expect(Setting::where('key', 'site_name')->count())->toBe(1);
});

test('produk dari seeder masuk ke kategori yang benar', function () {
    $this->seed();

    expect(Product::firstWhere('slug', 'kartu-nama-glossy')->category->slug)->toBe('name-card');
    expect(Product::firstWhere('slug', 'cutting-sticker')->category->slug)->toBe('sticker');
});
