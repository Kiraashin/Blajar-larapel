<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard Admin || PPKD Sticker";
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        $latestProducts = Product::with('category')->latest()->take(5)->get();
        $categories = Category::withCount('products')->orderBy('sort_order')->get();

        return view('admin.dashboard.index', compact(
            'title',
            'totalProducts',
            'totalCategories',
            'totalUsers',
            'latestProducts',
            'categories',
        ));
    }
}
