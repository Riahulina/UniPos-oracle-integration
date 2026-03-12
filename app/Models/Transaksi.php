<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function usaha()
        {
            return $this->belongsTo(Usaha::class);
        }

    public function user()
        {
            return $this->belongsTo(User::class);
        }

    public function detail()
        {
            return $this->hasMany(DetailTransaksi::class);
        }
 }
