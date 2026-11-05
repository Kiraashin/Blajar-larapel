<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Belajar Laravel' }}</title>
</head>
<body>
    <h1>Belajar Matematika Dasar</h1>
    {{-- url, route, /nama-route --}}
    <a href="{{ route('tambah') }}">Tambah-tambahan</a>
    <a href="{{ route('pengurangan') }}">Pengurangan</a>
    <a href="{{ route('bagi') }}">Bagi-bagian</a>
    <a href="{{ route('perkalian') }}">Perkalian</a>

    <a href="{{ url()->previous() }}">Kembali</a>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <main>
        {{-- directive --}}
        @yield('content')
    </main>
</body>
</html>
