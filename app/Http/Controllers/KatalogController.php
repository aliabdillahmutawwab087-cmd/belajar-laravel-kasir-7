<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class KatalogController extends Controller
{
    public function index(Request $request): View
    {
        // 1. Pindahkan array data ke dalam method index
        $semuaProduk = [
            [
                'id' => 1,
                'nama' => 'Kopi Ende',
                'kategori' => 'Minuman',
                'harga' => 15000,
                'stok' => 12
            ],
            [
                'id' => 2,
                'nama' => 'Roti Cokelat',
                'kategori' => 'Makanan',
                'harga' => 8000,
                'stok' => 0
            ],
        ];

        // 2. Ambil kata kunci pencarian dari URL (?q=...)
        $q = $request->input('q');

        // 3. Filter produk jika ada pencarian
        if ($q) {
            $produk = array_filter($semuaProduk, function ($item) use ($q) {
                return stripos($item['nama'], $q) !== false;
            });
        } else {
            $produk = $semuaProduk;
        }

        // 4. Kirim variabel 'produk' dan 'q' ke view
        return view('katalog.index', compact('produk', 'q'));
    }
}
