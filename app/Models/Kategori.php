<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // ✅ SESUAI NAMA TABEL DI DATABASE
    protected $table = 'kategori';

    protected $fillable = [
        'usaha_id',
        'nama_kategori'
    ];

    // Relasi ke usaha
    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }

    // Relasi ke produk
    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
