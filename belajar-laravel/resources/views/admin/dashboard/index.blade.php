@extends('admin.layouts.app')
@section('title', 'Dashboard Admin')
@section('subtitle', 'Ringkasan data operasional Sticker PPKD JP')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card card-stat p-3 border">
                <span class="stat-label">Total Produk</span>
                <div class="stat-value">{{ $totalProducts }}</div>
                <a href="{{ route('admin.product.index') }}" class="small text-decoration-none">Kelola produk <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat p-3 border">
                <span class="stat-label">Total Kategori</span>
                <div class="stat-value">{{ $totalCategories }}</div>
                <a href="{{ route('admin.category.index') }}" class="small text-decoration-none">Kelola kategori <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat p-3 border">
                <span class="stat-label">Total User</span>
                <div class="stat-value">{{ $totalUsers }}</div>
                <a href="{{ route('admin.user.index') }}" class="small text-decoration-none">Kelola user <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <h5 class="fw-bold mb-3">Produk Terbaru</h5>
            <div class="table-responsive">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($latestProducts as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-5">
            <h5 class="fw-bold mb-3">Produk per Kategori</h5>
            <div class="table-responsive">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Jumlah Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->products_count }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">Belum ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
