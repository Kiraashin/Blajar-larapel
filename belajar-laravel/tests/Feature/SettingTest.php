<?php

use App\Models\Setting;
use Database\Seeders\SettingSeeder;

test('halaman pengaturan bisa dibuka walau tabel settings masih kosong', function () {
    $this->actingAs(adminUser())
        ->get(route('admin.settings'))
        ->assertOk();
});

test('halaman pengaturan menampilkan nilai yang tersimpan', function () {
    $this->seed(SettingSeeder::class);
    Setting::where('key', 'phone')->update(['value' => '0811-222-333']);

    $this->actingAs(adminUser())
        ->get(route('admin.settings'))
        ->assertOk()
        ->assertSee('PPKD Sticker')
        ->assertSee('0811-222-333');
});

test('halaman pengaturan provides rich-text editors for long fields', function () {
    $this->actingAs(adminUser())
        ->get(route('admin.settings'))
        ->assertOk()
        ->assertSee('data-rich-text', false)
        ->assertSee('site_description')
        ->assertSee('address')
        ->assertSee(asset('assets/libs/quill/quill.js'));
});

test('pengaturan tersimpan tanpa menimpa label bawaan seeder', function () {
    $this->seed(SettingSeeder::class);

    $this->actingAs(adminUser())
        ->post(route('admin.settings.update'), [
            'site_name' => 'Toko Baru',
            'phone' => '0812-000-111',
            'email_order' => 'order@example.com',
            'url_instagram' => 'https://instagram.com/tokobaru',
        ])
        ->assertRedirect(route('admin.settings'));

    $siteName = Setting::firstWhere('key', 'site_name');

    expect($siteName->value)->toBe('Toko Baru');
    expect($siteName->label)->toBe('Nama Lembaga / Website');
    expect(Setting::firstWhere('key', 'phone')->value)->toBe('0812-000-111');
});

test('rich-text settings are sanitized before saving', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.settings.update'), [
            'site_description' => '<p>Deskripsi <em>format</em></p><script>alert(1)</script>',
            'address' => '<p>Alamat <strong>format</strong></p>',
        ])
        ->assertRedirect(route('admin.settings'));

    expect(Setting::where('key', 'site_description')->value('value'))
        ->toContain('<em>format</em>')
        ->not->toContain('<script');

    expect(Setting::where('key', 'address')->value('value'))
        ->toContain('<strong>format</strong>');
});

test('pengaturan baru dibuat kalau barisnya belum ada', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.settings.update'), ['site_name' => 'Toko Baru'])
        ->assertRedirect(route('admin.settings'));

    $this->assertDatabaseHas('settings', ['key' => 'site_name', 'value' => 'Toko Baru']);
});

test('email dan url pengaturan divalidasi', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.settings.update'), [
            'email_order' => 'bukan-email',
            'url_tiktok' => 'bukan-url',
        ])
        ->assertSessionHasErrors(['email_order', 'url_tiktok']);
});
