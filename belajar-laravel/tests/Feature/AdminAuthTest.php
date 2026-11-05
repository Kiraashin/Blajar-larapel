<?php

use App\Models\User;

test('tamu diarahkan ke halaman login saat membuka halaman admin', function () {
    $this->get(route('admin.dashboard.index'))->assertRedirect(route('admin.login'));
    $this->get(route('admin.product.index'))->assertRedirect(route('admin.login'));
    $this->get(route('admin.settings'))->assertRedirect(route('admin.login'));
});

test('halaman login bisa dibuka', function () {
    $this->get(route('admin.login'))->assertOk();
});

test('admin bisa login dengan email dan password yang benar', function () {
    $user = User::factory()->create(['email' => 'admin@example.com']);

    $this->post(route('admin.actionLogin'), [
        'email' => 'admin@example.com',
        'password' => 'password',
    ])->assertRedirect(route('admin.dashboard.index'));

    $this->assertAuthenticatedAs($user);
});

test('login gagal kalau password salah', function () {
    User::factory()->create(['email' => 'admin@example.com']);

    $this->from(route('admin.login'))
        ->post(route('admin.actionLogin'), [
            'email' => 'admin@example.com',
            'password' => 'salah-password',
        ])
        ->assertRedirect(route('admin.login'))
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('admin yang sudah login tidak perlu membuka halaman login lagi', function () {
    $this->actingAs(adminUser())
        ->get(route('admin.login'))
        ->assertRedirect(route('admin.dashboard.index'));
});

test('admin bisa logout', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.logout'))
        ->assertRedirect(route('admin.login'));

    $this->assertGuest();
});

test('dashboard menampilkan ringkasan data', function () {
    $this->actingAs(adminUser())
        ->get(route('admin.dashboard.index'))
        ->assertOk()
        ->assertSee('Total Produk');
});
