<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class BarcodeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $produk = Produk::where('usaha_id', $user->usaha_id)
            ->whereNotNull('barcode')
            ->orderBy('nama_produk')
            ->get();

        return view('dashboard.barcode.index', compact('produk'));
    }
}
