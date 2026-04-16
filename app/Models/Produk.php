<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'usaha_id',
        'kategori_id',
        'kode_produk',
        'barcode',
        'nama_produk',
        'harga_beli',
        'harga_jual',
        'stok',
        'stok_minimal',
        'satuan',
        'gambar',
        'is_jasa',
        'status',
    ];

    protected $casts = [
        'harga_beli' => 'decimal:2',
        'harga_jual' => 'decimal:2',
        'is_jasa' => 'boolean',
    ];

    // 🔗 Relasi ke Usaha
    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }

    // 🔗 Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
