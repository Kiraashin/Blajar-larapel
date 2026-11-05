<div class="mb-3">
    <label for="name" class="form-label-custom">Nama Kategori *</label>
    <input type="text" id="name" class="form-control" name="name" required value="{{ old('name', $category->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="slug" class="form-label-custom">Slug (opsional)</label>
    <input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug', $category->slug ?? '') }}">
    <div class="form-text">
        <small>Kosongkan untuk dibuat otomatis dari nama kategori.</small>
    </div>
    @error('slug')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
<x-rich-text-editor name="description" label="Deskripsi" :value="$category->description ?? ''" :rows="6" />
<div class="mb-3">
    <label for="icon" class="form-label-custom">Ikon</label>
    <input type="text" id="icon" class="form-control" name="icon" placeholder="contoh: bi bi-printer" value="{{ old('icon', $category->icon ?? '') }}">
    <div class="form-text">
        <small>Nama class Bootstrap Icons, contoh: <code>bi bi-printer</code>.</small>
    </div>
    @error('icon')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="sort_order" class="form-label-custom">Urutan Tampil</label>
    <input type="number" id="sort_order" min="0" class="form-control" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}">
    @error('sort_order')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
