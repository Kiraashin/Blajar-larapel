<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Support\RichText;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Management Kategori Produk || PPKD Sticker";
        $categories = Category::withCount('products')->orderBy('sort_order')->get();
        return view('admin.category.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Kategori || PPKD Sticker";
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // slug digital-marketing (kalau kosong, dibuat dari nama)
        $this->prepareSlug($request);

        $validated = $request->validate($this->rules());

        $validated['description'] = RichText::sanitize($validated['description'] ?? null);
        $validated['slug'] ??= 'kategori-' . Str::lower(Str::random(6));
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        Category::create($validated);

        return redirect()->route('admin.category.index')->with('success', 'Kategori Produk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $title = 'Edit Kategori || PPKD Sticker';
        return view('admin.category.edit', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->prepareSlug($request);

        $validated = $request->validate($this->rules($category));

        $validated['description'] = RichText::sanitize($validated['description'] ?? null);
        $validated['slug'] ??= $category->slug;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $category->update($validated);

        return redirect()->route('admin.category.index')->with('success', 'Kategori Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // produk di kategori ini tidak ikut terhapus, category_id nya jadi kosong (onDelete set null)
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Kategori Produk berhasil dihapus!');
    }

    /**
     * Rapikan slug sebelum divalidasi, supaya pengecekan unique memakai slug final.
     */
    private function prepareSlug(Request $request): void
    {
        $slug = Str::slug((string) ($request->input('slug') ?: $request->input('name')));

        $request->merge(['slug' => $slug !== '' ? $slug : null]);
    }

    private function rules(?Category $category = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($category?->id)],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'icon' => ['nullable', 'string', 'max:255'],
        ];
    }
}
