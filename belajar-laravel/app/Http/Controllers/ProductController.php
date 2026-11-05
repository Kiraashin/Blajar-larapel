<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Support\RichText;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Managemen Produk || PPKD Sticker";
        // many to one = banyak produk milik satu kategori
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Produk || PPKD Sticker";
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.products.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // slug untuk menambahkan garis" atau titik di url
        $this->prepareSlug($request);

        $validated = $request->validate($this->rules());

        $data = Arr::except($validated, 'image');
        $data['description'] = RichText::sanitize($data['description'] ?? null);
        $data['slug'] ??= $this->uniqueSlug($validated['name']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $title = "Edit Produk || PPKD Sticker";
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.products.edit', compact('title', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->prepareSlug($request);

        $validated = $request->validate($this->rules($product));

        $data = Arr::except($validated, 'image');
        $data['description'] = RichText::sanitize($data['description'] ?? null);
        $data['slug'] ??= $product->slug ?: $this->uniqueSlug($validated['name'], $product->id);

        if ($request->hasFile('image')) {
            // hapus gambar lama, ganti dengan yang baru
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus');
    }

    /**
     * Rapikan slug yang diketik user. Kalau kosong dibiarkan null,
     * nanti dibuat otomatis dari nama produk (lihat uniqueSlug).
     */
    private function prepareSlug(Request $request): void
    {
        $slug = Str::slug((string) $request->input('slug'));

        $request->merge(['slug' => $slug !== '' ? $slug : null]);
    }

    /**
     * Buat slug dari nama dan pastikan belum dipakai produk lain (tambah -2, -3, dst).
     */
    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'produk';
        $slug = $base;
        $counter = 2;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '<>', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    private function rules(?Product $product = null): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif,webp', 'max:2048'],
            'name' => ['required', 'string', 'max:55'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($product?->id)],
            'brief_description' => ['nullable', 'string', 'max:1000'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'price_art_cartoon' => ['nullable', 'integer', 'min:0'],
            'price_art_paper' => ['nullable', 'integer', 'min:0'],
            'price_hvs' => ['nullable', 'integer', 'min:0'],
            'price_doft' => ['nullable', 'integer', 'min:0'],
            'price_glossy' => ['nullable', 'integer', 'min:0'],
            'cutting_price' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
