<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'usaha_id',
        'user_id',
        'nama_pelanggan', // ✅ pakai ini
        'total',
        'bayar',
        'kembalian',
        'status' 
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

    // 🔗 ke user (kasir login)
    public function user()
    {
        return $this->belongsTo(User::class);
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

    // jumlah total item
    public function getTotalItemAttribute()
    {
        return $this->items->sum('qty');
    }

    // 🔥 fallback nama pelanggan (biar ga null di view)
    public function getNamaPelangganFixAttribute()
    {
        return $this->nama_pelanggan ?: 'Umum';
    }
}