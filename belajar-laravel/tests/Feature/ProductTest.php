<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function productPayload(Category $category, array $overrides = []): array
{
    return array_merge([
        'category_id' => $category->id,
        'name' => 'Sticker Vinyl',
        'price' => 10000,
        'price_art_cartoon' => 11000,
        'price_art_paper' => 12000,
        'price_hvs' => 13000,
        'price_doft' => 14000,
        'price_glossy' => 15000,
        'cutting_price' => 16000,
        'brief_description' => 'Sticker tahan air',
        'description' => '<p>Deskripsi lengkap</p>',
    ], $overrides);
}

test('produk baru tersimpan lengkap dengan harga di kolom yang benar', function () {
    Storage::fake('public');
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);

    $this->actingAs(adminUser())
        ->post(route('admin.product.store'), productPayload($category, [
            'image' => UploadedFile::fake()->image('sticker.jpg'),
        ]))
        ->assertRedirect(route('admin.product.index'));

    $product = Product::firstWhere('name', 'Sticker Vinyl');

    expect($product)
        ->category_id->toBe($category->id)
        ->slug->toBe('sticker-vinyl')
        ->price->toBe(10000)
        ->price_art_cartoon->toBe(11000)
        ->price_art_paper->toBe(12000)
        ->price_hvs->toBe(13000)
        ->price_doft->toBe(14000)
        ->price_glossy->toBe(15000)
        ->cutting_price->toBe(16000)
        ->brief_description->toBe('Sticker tahan air')
        ->description->toBe('<p>Deskripsi lengkap</p>');

    Storage::disk('public')->assertExists($product->image);
});

test('produk bisa disimpan tanpa gambar', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);

    $this->actingAs(adminUser())
        ->post(route('admin.product.store'), productPayload($category))
        ->assertRedirect(route('admin.product.index'));

    expect(Product::firstWhere('name', 'Sticker Vinyl')->image)->toBeNull();
});

test('deskripsi produk menyimpan format teks yang aman', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);

    $this->actingAs(adminUser())
        ->post(route('admin.product.store'), productPayload($category, [
            'description' => '<p>Teks <strong>tebal</strong></p><script>alert(1)</script><a href="javascript:alert(1)">tautan</a>',
        ]))
        ->assertRedirect(route('admin.product.index'));

    expect(Product::firstWhere('name', 'Sticker Vinyl')->description)
        ->toContain('<strong>tebal</strong>')
        ->not->toContain('<script')
        ->not->toContain('javascript:');
});

test('slug produk otomatis dibuat unik kalau namanya sama', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);
    $admin = adminUser();

    $this->actingAs($admin)->post(route('admin.product.store'), productPayload($category));
    $this->actingAs($admin)->post(route('admin.product.store'), productPayload($category));

    expect(Product::pluck('slug')->all())->toBe(['sticker-vinyl', 'sticker-vinyl-2']);
});

test('produk wajib punya nama, kategori yang valid dan harga', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.product.store'), ['category_id' => 999])
        ->assertSessionHasErrors(['category_id', 'name', 'price']);
});

test('produk bisa diedit dan gambar lama diganti', function () {
    Storage::fake('public');
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);
    $admin = adminUser();

    $this->actingAs($admin)->post(route('admin.product.store'), productPayload($category, [
        'image' => UploadedFile::fake()->image('lama.jpg'),
    ]));
    $product = Product::firstWhere('name', 'Sticker Vinyl');
    $oldImage = $product->image;

    $this->actingAs($admin)
        ->put(route('admin.product.update', $product), productPayload($category, [
            'name' => 'Sticker Hologram',
            'price' => 20000,
            'image' => UploadedFile::fake()->image('baru.jpg'),
        ]))
        ->assertRedirect(route('admin.product.index'));

    $product->refresh();

    expect($product)->name->toBe('Sticker Hologram')->price->toBe(20000);
    Storage::disk('public')->assertMissing($oldImage);
    Storage::disk('public')->assertExists($product->image);
});

test('produk dan gambarnya terhapus saat dihapus', function () {
    Storage::fake('public');
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);
    $admin = adminUser();

    $this->actingAs($admin)->post(route('admin.product.store'), productPayload($category, [
        'image' => UploadedFile::fake()->image('sticker.jpg'),
    ]));
    $product = Product::firstWhere('name', 'Sticker Vinyl');
    $image = $product->image;

    $this->actingAs($admin)
        ->delete(route('admin.product.destroy', $product))
        ->assertRedirect(route('admin.product.index'));

    $this->assertModelMissing($product);
    Storage::disk('public')->assertMissing($image);
});

test('halaman produk tetap bisa dibuka walau kategori produknya sudah dihapus', function () {
    $category = Category::create(['name' => 'Sticker', 'slug' => 'sticker']);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Sticker Vinyl', 'price' => 10000]);
    $category->delete();

    $admin = adminUser();

    $this->actingAs($admin)->get(route('admin.product.index'))->assertOk()->assertSee('Sticker Vinyl');
    $this->actingAs($admin)->get(route('admin.product.edit', $product))->assertOk();
    $this->actingAs($admin)->get(route('admin.product.create'))
        ->assertOk()
        ->assertSee('data-rich-text', false)
        ->assertSee(asset('assets/libs/quill/quill.js'));
});
