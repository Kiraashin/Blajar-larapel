@extends('admin.layouts.app')
@section('title', 'Tambah User')
@section('subtitle', 'Buat akun baru dengan akses ke Panel Admin')

@section('content')
<form action="{{ route('admin.user.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label-custom">Nama Lengkap *</label>
        <input type="text" id="name" class="form-control" name="name" required value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label-custom">Email *</label>
        <input type="email" id="email" class="form-control" name="email" required value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label-custom">Password *</label>
        <input type="password" id="password" class="form-control" name="password" required minlength="8">
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
        <a href="{{ route('admin.user.index') }}" class="text-muted ms-2">Kembali</a>
    </div>
</form>
@endsection
