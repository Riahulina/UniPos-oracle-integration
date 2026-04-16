<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'usaha_id',
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

    // 🔗 ke detail transaksi
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER (BIAR ENAK DIPAKE)
    |--------------------------------------------------------------------------
    */

    // total qty semua item
    public function getTotalItemAttribute()
    {
        return $this->detailTransaksi->sum('qty');
    }
}