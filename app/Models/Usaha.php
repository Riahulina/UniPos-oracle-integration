<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'usaha';

    protected $fillable = [
        'kode_usaha',
        'nama_usaha',
        'alamat',
        'telp',
        'logo',
        'status',
        'approved_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
