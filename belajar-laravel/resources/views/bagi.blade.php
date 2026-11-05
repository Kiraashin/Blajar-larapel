@extends('belajar')
@section('content')

    <form action="{{ route('actionBagi') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="angka1">Angka 1</label>
            <input type="number" step="any" id="angka1" name="angka1" placeholder="Masukkan angka" value="{{ old('angka1') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="angka2">Angka 2</label>
            <input type="number" step="any" id="angka2" name="angka2" placeholder="Masukkan angka" value="{{ old('angka2') }}">
        </div>
        <br>
        <div class="form-group">
            <button type="submit">Bagikan</button>
        </div>
    </form>
    <br>
    <h1>Hasilnya adalah {{ $jumlah ?? 0 }}</h1>
@endsection
