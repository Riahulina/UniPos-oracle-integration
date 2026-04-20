<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'usaha_id',
        'user_id',        // ✅ WAJIB TAMBAH INI
        'pelanggan_id',
        'total',
        'bayar',
        'kembalian'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    // 🔗 ke usaha
    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }

    // 🔗 ke user (🔥 TAMBAH INI JUGA BIAR NAMA KASIR MUNCUL)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // 🔗 ke item transaksi
    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER
    |--------------------------------------------------------------------------
    */

    public function getTotalItemAttribute()
    {
        return $this->items->sum('qty');
    }
}