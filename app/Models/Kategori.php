<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }

    public function produk()
        {
            return $this->hasMany(Produk::class);
        }
}
