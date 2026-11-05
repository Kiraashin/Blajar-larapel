@extends('layouts.app')

@section('content')
    <section class="py-4 py-lg-5">
        <div class="container">
            <header class="mb-4">
                <p class="text-primary fw-semibold mb-1">Katalog Produk</p>
                <h1 class="h2 fw-bold mb-2">{{ $category?->name ?? 'Semua Produk' }}</h1>
                @if ($categoryDescription)
                    <div class="text-muted mb-0">{!! $categoryDescription !!}</div>
                @endif
            </header>

            @if ($categories->isNotEmpty())
                <nav aria-label="Filter kategori" class="d-flex flex-wrap gap-2 mb-4">
                    <a class="btn btn-sm {{ $category ? 'btn-outline-primary' : 'btn-primary' }}"
                        href="{{ route('catalog.index') }}">Semua Produk</a>
                    @foreach ($categories as $item)
                        <a class="btn btn-sm {{ $category?->is($item) ? 'btn-primary' : 'btn-outline-primary' }}"
                            href="{{ route('catalog.category', $item->slug) }}">{{ $item->name }}</a>
                    @endforeach
                </nav>
            @endif

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                @forelse ($products as $product)
                    <div class="col">
                        <article class="product-card h-100">
                            <div class="product-img-container">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="w-100 h-100 object-fit-cover">
                                @else
                                    <div class="d-flex align-items-center justify-content-center text-primary fs-1 opacity-75 h-100">
                                        <i class="bi bi-image" aria-hidden="true"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                @if ($product->category)
                                    <a class="text-muted small mb-1"
                                        href="{{ route('catalog.category', $product->category->slug) }}">
                                        {{ $product->category->name }}
                                    </a>
                                @else
                                    <span class="text-muted small mb-1">Tanpa Kategori</span>
                                @endif
                                <h2 class="h6 fw-bold mb-2 text-dark">{{ $product->name }}</h2>
                                @if ($product->brief_description)
                                    <p class="text-muted small mb-3">{{ $product->brief_description }}</p>
                                @endif
                                <div class="mt-auto">
                                    <span class="text-muted small d-block">Mulai dari</span>
                                    <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted mb-0">Belum ada produk untuk ditampilkan.</p>
                    </div>
                @endforelse
            </div>

            @if ($products->hasPages())
                <div class="mt-4">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
@endsection
