@extends('admin.layouts.app')
@section('title', 'Edit Kategori')
@section('subtitle', 'Perbarui data kategori produk')

@section('content')
<form action="{{ route('admin.category.update', $category) }}" method="post">
    @csrf
    @method('PUT')
    @include('admin.category._form')
    <div class="mb-3">
        <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
        <a href="{{ route('admin.category.index') }}" class="text-muted ms-2">Kembali</a>
    </div>
</form>
@endsection
