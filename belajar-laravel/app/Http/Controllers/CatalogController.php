<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Support\RichText;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        $categories = Category::orderBy('sort_order')->get();
        $products = Product::with('category')->latest()->paginate(12);

        return view('catalog.index', [
            'categories' => $categories,
            'category' => null,
            'categoryDescription' => null,
            'products' => $products,
        ]);
    }

    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::orderBy('sort_order')->get();
        $products = $category->products()->with('category')->latest()->paginate(12);
        $categoryDescription = RichText::sanitize($category->description);

        return view('catalog.index', compact('categories', 'category', 'categoryDescription', 'products'));
    }
}
