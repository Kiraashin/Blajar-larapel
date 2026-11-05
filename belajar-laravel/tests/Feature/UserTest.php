<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('user baru dibuat dengan password ter-hash', function () {
    $this->actingAs(adminUser())
        ->post(route('admin.user.store'), [
            'name' => 'Staff Baru',
            'email' => 'staff@example.com',
            'password' => 'rahasia123',
        ])
        ->assertRedirect(route('admin.user.index'));

    $user = User::firstWhere('email', 'staff@example.com');

    expect($user->password)->not->toBe('rahasia123');
    expect(Hash::check('rahasia123', $user->password))->toBeTrue();
});

test('email user tidak boleh kembar', function () {
    $admin = adminUser();

    $this->actingAs($admin)
        ->post(route('admin.user.store'), [
            'name' => 'Staff Baru',
            'email' => $admin->email,
            'password' => 'rahasia123',
        ])
        ->assertSessionHasErrors('email');
});

test('password tetap kalau kolom password dikosongkan saat edit', function () {
    $admin = adminUser();
    $staff = User::factory()->create();
    $oldPassword = $staff->password;

    $this->actingAs($admin)
        ->put(route('admin.user.update', $staff), [
            'name' => 'Nama Baru',
            'email' => $staff->email,
            'password' => '',
        ])
        ->assertRedirect(route('admin.user.index'));

    expect($staff->fresh())->name->toBe('Nama Baru')->password->toBe($oldPassword);
});

test('admin bisa menghapus user lain', function () {
    $admin = adminUser();
    $staff = User::factory()->create();

    $this->actingAs($admin)
        ->delete(route('admin.user.destroy', $staff))
        ->assertRedirect(route('admin.user.index'));

    $this->assertModelMissing($staff);
});

test('admin tidak bisa menghapus akunnya sendiri', function () {
    $admin = adminUser();

    $this->actingAs($admin)
        ->delete(route('admin.user.destroy', $admin))
        ->assertRedirect(route('admin.user.index'))
        ->assertSessionHas('error');

    $this->assertModelExists($admin);
});
