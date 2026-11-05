@extends('admin.layouts.app')
@section('title', 'Kelola Produk')
@section('subtitle', 'List seluruh produk di PPKD sticker')
@section('content')
    <div align="right" class="mb-3">
        <a href="{{ route('admin.product.create') }}" class="btn-table-action">
            <i class="bi bi-plus-circle-fill"></i> Tambah Produk
        </a>
    </div>
    <div class="table-responsive mt-1">
        <table class="table-custom" id="table-products">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" width="100" alt="{{ $item->name }}">
                        @else
                            <span class="text-muted">Belum ada gambar</span>
                        @endif
                    </td>
                    {{-- category bisa null kalau kategorinya sudah dihapus (onDelete set null) --}}
                    <td>{{ $item->category->name ?? '-' }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.product.edit', $item) }}" class="table-btn-action" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.product.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="table-btn-action delete" type="submit" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
