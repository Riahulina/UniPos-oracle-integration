<?php

// ═══════════════════════════════════════════════
// app/Models/TransaksiItem.php
// ═══════════════════════════════════════════════

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'nama_produk',   // snapshot nama saat transaksi
        'harga',         // snapshot harga saat transaksi
        'qty',
        'subtotal',
    ];

    /**
     * Relasi ke Transaksi induk
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    /**
     * Relasi ke Produk (bisa null kalau produk sudah dihapus)
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class)->withDefault();
    }
}