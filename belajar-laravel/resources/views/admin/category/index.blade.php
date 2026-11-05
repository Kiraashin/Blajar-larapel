@extends('admin.layouts.app')
@section('title', 'Managemen Kategori')
@section('subtitle', 'Pengelompokkan kategori produk')

@section('content')
<div class="mb-3" align="right">
    <a href="{{ route('admin.category.create') }}" class="btn-table-action">
        <i class="bi bi-plus-circle-fill"></i> Tambah Kategori
    </a>
</div>
<div class="table-responsive">
    <table class="table-custom">
        <thead>
            <tr>
                <th>#</th>
                <th>Ikon</th>
                <th>Nama</th>
                <th>Slug Url</th>
                <th>Jumlah Produk</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>@if ($data->icon)<i class="{{ $data->icon }}"></i>@endif</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->slug }}</td>
                <td>{{ $data->products_count }}</td>
                <td>{{ $data->sort_order }}</td>
                <td>
                    <a class="table-btn-action" title="Edit" href="{{ route('admin.category.edit', $data) }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.category.destroy', $data) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini? Produk di dalamnya tidak ikut terhapus, tetapi jadi tanpa kategori.')">
                        @csrf
                        @method('DELETE')
                        <button class="table-btn-action delete" title="Delete" type="submit">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Belum ada kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
