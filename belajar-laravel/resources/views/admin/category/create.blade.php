@extends('admin.layouts.app')
@section('title', 'Tambah Kategori')
@section('subtitle', 'Buat kategori baru untuk mengelompokkan produk')

@section('content')
<form action="{{ route('admin.category.store') }}" method="post">
    @csrf
    @include('admin.category._form')
    <div class="mb-3">
        <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
        <a href="{{ route('admin.category.index') }}" class="text-muted ms-2">Kembali</a>
    </div>
</form>
@endsection
