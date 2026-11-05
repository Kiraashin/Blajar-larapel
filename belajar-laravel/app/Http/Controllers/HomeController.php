<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order')->get();
        $newProducts = Product::with('category')->latest()->take(8)->get();

        return view('home.index', compact('categories', 'newProducts'));
    }
}
