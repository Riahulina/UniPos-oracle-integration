<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class BarcodeController extends Controller
{
    public function index()
    {
        $produk = Produk::where('usaha_id', auth()->user()->usaha_id)
            ->whereNotNull('barcode')
            ->orderBy('nama_produk')
            ->get();

        return view('dashboard.barcode.index', compact('produk'));
    }
}