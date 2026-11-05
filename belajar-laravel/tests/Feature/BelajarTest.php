<?php

test('operasi hitung dasar menghasilkan jawaban yang benar', function (string $route, int|float $angka1, int|float $angka2, string $hasil) {
    $this->post(route($route), ['angka1' => $angka1, 'angka2' => $angka2])
        ->assertOk()
        ->assertSee("Hasilnya adalah {$hasil}");
})->with([
    'tambah' => ['actionTambah', 6, 3, '9'],
    'kurang' => ['actionKurang', 6, 3, '3'],
    'kali' => ['actionKali', 6, 3, '18'],
    'bagi' => ['actionBagi', 6, 3, '2'],
]);

test('pembagian dengan angka 0 ditolak dengan pesan error, bukan crash', function () {
    $this->from(route('bagi'))
        ->post(route('actionBagi'), ['angka1' => 6, 'angka2' => 0])
        ->assertRedirect(route('bagi'))
        ->assertSessionHasErrors('angka2');
});
