<?php

use App\Models\Category;

test('kategori baru dibuat dengan slug otomatis dari nama dan menyimpan deskripsi', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.category.store'), [
            'name' => 'Digital Marketing',
            'description' => 'Semua kebutuhan promosi',
            'sort_order' => 3,
        ])
        ->assertRedirect(route('admin.category.index'));

    $this->assertDatabaseHas('categories', [
        'name' => 'Digital Marketing',
        'slug' => 'digital-marketing',
        'description' => 'Semua kebutuhan promosi',
        'sort_order' => 3,
    ]);
});

test('editor deskripsi kategori menyimpan format yang aman dan menampilkannya', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.category.store'), [
            'name' => 'Digital Marketing',
            'description' => '<p>Teks <strong>tebal</strong></p><ol><li data-list="bullet"><span class="ql-ui"></span>Produk unggulan</li></ol><script>alert(1)</script>',
        ])
        ->assertRedirect(route('admin.category.index'));

    $category = Category::firstWhere('slug', 'digital-marketing');

    expect($category->description)
        ->toContain('<strong>tebal</strong>')
        ->toContain('<ul><li>Produk unggulan</li></ul>')
        ->not->toContain('<script');

    $this->get(route('catalog.category', $category->slug))
        ->assertOk()
        ->assertSee('<strong>tebal</strong>', false)
        ->assertDontSee('alert(1)');
});

test('slug kategori tidak boleh sama dengan kategori lain', function () {
    Category::create(['name' => 'Sticker', 'slug' => 'sticker']);

    $this->actingAs(adminUser())
        ->post(route('admin.category.store'), ['name' => 'Sticker Baru', 'slug' => 'Sticker'])
        ->assertSessionHasErrors('slug');

    expect(Category::count())->toBe(1);
});

test('kategori bisa diperbarui tanpa mengubah slug miliknya sendiri', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker', 'sort_order' => 5]);

    $this->actingAs(adminUser())
        ->put(route('admin.category.update', $category), [
            'name' => 'Sticker Vinyl',
            'slug' => 'sticker',
            'sort_order' => 5,
        ])
        ->assertRedirect(route('admin.category.index'));

    expect($category->fresh())
        ->name->toBe('Sticker Vinyl')
        ->slug->toBe('sticker')
        ->sort_order->toBe(5);
});

test('kategori bisa dihapus', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);

    $this->actingAs(adminUser())
        ->delete(route('admin.category.destroy', $category))
        ->assertRedirect(route('admin.category.index'));

    $this->assertModelMissing($category);
});

test('halaman daftar, tambah dan edit kategori bisa dibuka', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);
    $admin = adminUser();

    $this->actingAs($admin)->get(route('admin.category.index'))->assertOk()->assertSee('Sticker');
    $this->actingAs($admin)->get(route('admin.category.create'))
        ->assertOk()
        ->assertSee('data-rich-text', false);
    $this->actingAs($admin)->get(route('admin.category.edit', $category))->assertOk();
});
