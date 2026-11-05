@extends('admin.layouts.app')
@section('title', 'Tambah Produk')
@section('subtitle', 'Tambahkan produk baru untuk ditampilkan di PPKD Sticker')

@section('content')
<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('admin.products._form')
</form>
@endsection
