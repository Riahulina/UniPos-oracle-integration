<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    // 🔥 WAJIB: samakan dengan nama tabel di database
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'nama_produk',   // snapshot nama saat transaksi
        'harga',         // snapshot harga saat transaksi
        'qty',
        'subtotal',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    // 🔗 ke transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    // 🔗 ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id')->withDefault();
    }
}