@extends('admin.layouts.app')
@section('title', 'Pengaturan Website')
@section('subtitle', 'Konfigurasi identitas website, logo, kontak dan informasi profil')

@section('content')

    <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs mb-3" id="defaultTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    <i class="bi bi-house-door me-1"></i> Pengaturan Umum
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">
                    <i class="bi bi-telephone me-1"></i> Kontak & Lokasi
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages-tab-pane"
                    type="button" role="tab" aria-controls="messages-tab-pane" aria-selected="false" tabindex="-1">
                    <i class="bi bi-link me-1"></i> Media Sosial
                </button>
            </li>
        </ul>

        <div class="tab-content text-muted-green small" id="defaultTabsContent">
            <div class="tab-pane fade active show mt-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">

                <h5 class="fw-bold text-main mb-3">Pengaturan Umum</h5>
                <div class="mb-3">
                    <label for="site_name" class="form-label">Nama Lembaga / Website</label>
                    <input type="text" id="site_name" class="form-control" name="site_name"
                        value="{{ old('site_name', $setting['site_name'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="site_tagline" class="form-label">Tagline Website</label>
                    <input type="text" id="site_tagline" class="form-control" name="site_tagline"
                        value="{{ old('site_tagline', $setting['site_tagline'] ?? '') }}">
                </div>
                <x-rich-text-editor name="site_description" label="Deskripsi Singkat Website"
                    :value="$setting['site_description'] ?? ''" :rows="5" />
                <div class="mb-3">
                    <label for="site_logo" class="form-label">Logo Utama Website</label>
                    <input type="file" id="site_logo" class="form-control" name="site_logo"
                        accept="image/png,image/jpeg,image/webp">
                    @if (! empty($setting['site_logo']))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $setting['site_logo']) }}" alt="Site Logo"
                                style="max-height: 80px; width: auto;">
                        </div>
                    @endif
                </div>
            </div>

            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h5 class="fw-bold text-main mb-3">Kontak & Lokasi</h5>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon Utama</label>
                    <input type="text" id="phone" class="form-control" name="phone"
                        value="{{ old('phone', $setting['phone'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="email_upload" class="form-label">Email Upload</label>
                    <input type="email" id="email_upload" class="form-control" name="email_upload"
                        value="{{ old('email_upload', $setting['email_upload'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="email_order" class="form-label">Email Order</label>
                    <input type="email" id="email_order" class="form-control" name="email_order"
                        value="{{ old('email_order', $setting['email_order'] ?? '') }}">
                </div>
                <x-rich-text-editor name="address" label="Alamat" :value="$setting['address'] ?? ''" :rows="5" />
            </div>

            <div class="tab-pane fade" id="messages-tab-pane" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">
                <h5 class="fw-bold text-main mb-3">Sosial Media</h5>

                <div class="mb-3">
                    <label for="url_shopee" class="form-label">Url Shopee</label>
                    <input type="url" id="url_shopee" class="form-control" name="url_shopee" placeholder="https://"
                        value="{{ old('url_shopee', $setting['url_shopee'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="url_facebook" class="form-label">Url Facebook</label>
                    <input type="url" id="url_facebook" class="form-control" name="url_facebook" placeholder="https://"
                        value="{{ old('url_facebook', $setting['url_facebook'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="url_instagram" class="form-label">Url Instagram</label>
                    <input type="url" id="url_instagram" class="form-control" name="url_instagram" placeholder="https://"
                        value="{{ old('url_instagram', $setting['url_instagram'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="url_youtube" class="form-label">Url Youtube</label>
                    <input type="url" id="url_youtube" class="form-control" name="url_youtube" placeholder="https://"
                        value="{{ old('url_youtube', $setting['url_youtube'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="url_tiktok" class="form-label">Url Tiktok</label>
                    <input type="url" id="url_tiktok" class="form-control" name="url_tiktok" placeholder="https://"
                        value="{{ old('url_tiktok', $setting['url_tiktok'] ?? '') }}">
                </div>
            </div>
        </div>

        <div class="card-footer mt-3">
            <button class="btn-custom btn-custom-primary" type="submit">Simpan</button>
        </div>
    </form>
@endsection
