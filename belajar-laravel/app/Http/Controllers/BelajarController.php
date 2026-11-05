<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $title = "Belajar Laravel asik deh";
        return view('belajar', compact('title'));
    }


    public function tambah()
    {
        $title = "Tambah-tambahan";
        return view('tambah', compact('title'));
    }

    public function actionTambah(Request $request)
    {
        $title = "tambah-tambahan";
        $validated = $this->validateAngka($request);
        $jumlah = $validated['angka1'] + $validated['angka2'];
        return view('tambah', compact('jumlah', 'title'));
    }


    public function kurang()
    {
        $title = "Pengurangan";
        return view('kurang', compact('title'));
    }

    public function actionKurang(Request $request)
    {
        $title = "pengurangan";
        $validated = $this->validateAngka($request);
        $jumlah = $validated['angka1'] - $validated['angka2'];
        return view('kurang', compact('jumlah', 'title'));
    }


    public function kali()
    {
        $title = "Perkalian";
        return view('kali', compact('title'));
    }

    public function actionKali(Request $request)
    {
        $title = "perkalian";
        $validated = $this->validateAngka($request);
        $jumlah = $validated['angka1'] * $validated['angka2'];
        return view('kali', compact('jumlah', 'title'));
    }


    public function bagi()
    {
        $title = "Pembagian";
        return view('bagi', compact('title'));
    }

    public function actionBagi(Request $request)
    {
        $title = "pembagian";
        // pembagi tidak boleh 0, kalau tidak PHP akan melempar DivisionByZeroError
        $validated = $this->validateAngka($request, pembagi: true);
        $jumlah = $validated['angka1'] / $validated['angka2'];
        return view('bagi', compact('jumlah', 'title'));
    }

    private function validateAngka(Request $request, bool $pembagi = false): array
    {
        return $request->validate([
            'angka1' => ['required', 'numeric'],
            'angka2' => $pembagi ? ['required', 'numeric', 'not_in:0'] : ['required', 'numeric'],
        ], [
            'angka2.not_in' => 'Angka 2 tidak boleh 0 untuk pembagian.',
        ]);
    }
}
