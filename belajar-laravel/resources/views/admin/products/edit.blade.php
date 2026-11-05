@extends('admin.layouts.app')
@section('title', 'Edit Produk')
@section('subtitle', 'Perbarui data produk PPKD Sticker')

@section('content')
<form action="{{ route('admin.product.update', $product) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.products._form')
</form>
@endsection
