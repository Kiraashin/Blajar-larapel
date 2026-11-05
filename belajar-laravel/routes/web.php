<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/category/{slug}', [CatalogController::class, 'category'])->name('catalog.category');

// get, post, put, delete
// si ('belajar') yg bakal di cari ke browser (localhost:8000/belajar) gitu contohnya.
Route::get('belajar', [BelajarController::class, 'index']);

Route::get('tambah', [BelajarController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [BelajarController::class, 'actionTambah'])->name('actionTambah');

Route::get('pengurangan', [BelajarController::class, 'kurang'])->name('pengurangan');
Route::post('actionKurang', [BelajarController::class, 'actionKurang'])->name('actionKurang');

Route::get('bagi', [BelajarController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [BelajarController::class, 'actionBagi'])->name('actionBagi');

Route::get('perkalian', [BelajarController::class, 'kali'])->name('perkalian');
Route::post('actionKali', [BelajarController::class, 'actionKali'])->name('actionKali');

// prefix
Route::prefix('admin')->name('admin.')->group(function () {
    // halaman login hanya untuk yang belum login (guest)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
    });

    // semua halaman admin wajib login (auth)
    Route::middleware('auth')->group(function () {
        Route::redirect('/', '/admin/dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::resource('dashboard', DashboardController::class)->only('index');
        Route::resource('user', UserController::class)->except('show');
        Route::resource('category', CategoryController::class)->except('show');
        Route::resource('product', ProductController::class)->except('show');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
