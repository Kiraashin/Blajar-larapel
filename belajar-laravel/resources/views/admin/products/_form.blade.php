@php
    // $product hanya ada di halaman edit
    $isEdit = isset($product);
@endphp

<div class="mb-3">
    <label for="name" class="form-label-custom">Nama Produk *</label>
    <input type="text" id="name" name="name" class="form-control" maxlength="55" required
        value="{{ old('name', $product->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="slug" class="form-label-custom">Slug (opsional)</label>
            <input type="text" id="slug" name="slug" class="form-control"
                value="{{ old('slug', $product->slug ?? '') }}">
            <div class="form-text">
                <small>Kosongkan untuk dibuat otomatis dari nama produk.</small>
            </div>
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="category_id" class="form-label-custom">Kategori *</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">--Pilih Kategori--</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" @selected((string) old('category_id', $product->category_id ?? '') === (string) $c->id)>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="image" class="form-label-custom">Gambar</label>
    <input type="file" id="image" class="form-control" name="image" accept="image/png,image/jpeg,image/gif,image/webp">
    <div class="form-text">
        <small>Format png, jpg, gif atau webp, maksimal 2 MB.@if ($isEdit && $product->image) Kosongkan jika tidak ingin mengganti gambar.@endif</small>
    </div>
    @if ($isEdit && $product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150" class="mt-2 rounded">
    @endif
    @error('image')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="brief_description" class="form-label-custom">Deskripsi Singkat</label>
    <textarea id="brief_description" name="brief_description" rows="2" maxlength="1000"
        class="form-control">{{ old('brief_description', $product->brief_description ?? '') }}</textarea>
    @error('brief_description')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<x-rich-text-editor name="description" label="Deskripsi" :value="$product->description ?? ''" :rows="10" />

<div class="row">
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="price" class="form-label-custom">Harga *</label>
            <input type="number" min="0" id="price" class="form-control" name="price" required
                value="{{ old('price', $product->price ?? '') }}">
            @error('price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="price_art_cartoon" class="form-label-custom">Harga Art Cartoon</label>
            <input type="number" min="0" id="price_art_cartoon" class="form-control" name="price_art_cartoon"
                value="{{ old('price_art_cartoon', $product->price_art_cartoon ?? '') }}">
            @error('price_art_cartoon')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="price_art_paper" class="form-label-custom">Harga Art Paper</label>
            <input type="number" min="0" id="price_art_paper" class="form-control" name="price_art_paper"
                value="{{ old('price_art_paper', $product->price_art_paper ?? '') }}">
            @error('price_art_paper')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="price_hvs" class="form-label-custom">Harga HVS</label>
            <input type="number" min="0" id="price_hvs" class="form-control" name="price_hvs"
                value="{{ old('price_hvs', $product->price_hvs ?? '') }}">
            @error('price_hvs')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="price_doft" class="form-label-custom">Harga Laminating Doft</label>
            <input type="number" min="0" id="price_doft" class="form-control" name="price_doft"
                value="{{ old('price_doft', $product->price_doft ?? '') }}">
            @error('price_doft')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="price_glossy" class="form-label-custom">Harga Laminating Glossy</label>
            <input type="number" min="0" id="price_glossy" class="form-control" name="price_glossy"
                value="{{ old('price_glossy', $product->price_glossy ?? '') }}">
            @error('price_glossy')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="cutting_price" class="form-label-custom">Harga Potong (Min 5x5 cm)</label>
            <input type="number" min="0" id="cutting_price" class="form-control" name="cutting_price"
                value="{{ old('cutting_price', $product->cutting_price ?? '') }}">
            @error('cutting_price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
    <a href="{{ route('admin.product.index') }}" class="btn-custom btn-custom-warning">Kembali</a>
</div>
