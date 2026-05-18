<?php

namespace App\Models;

use App\Models\User;
use App\Models\Usaha;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'user_id',
        'usaha_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'catatan',
        'dicatat_oleh',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // ── RELASI ──────────────────────────────────────────────
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }

    public function pencatat()
    {
        return $this->belongsTo(User::class, 'dicatat_oleh');
    }

    // ── SCOPE ───────────────────────────────────────────────
    public function scopeHariIni($query)
    {
        return $query->whereDate('tanggal', today());
    }

    public function scopeUsaha($query, $usahaId)
    {
        return $query->where('usaha_id', $usahaId);
    }

    // ── HELPER ──────────────────────────────────────────────
    public function getDurasiAttribute(): string
    {
        if (!$this->jam_masuk || !$this->jam_keluar) return '—';

        $masuk  = \Carbon\Carbon::parse($this->jam_masuk);
        $keluar = \Carbon\Carbon::parse($this->jam_keluar);
        $diff   = $masuk->diff($keluar);

        return $diff->h . 'j ' . $diff->i . 'm';
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'hadir' => '#059669',
            'izin'  => '#D97706',
            'sakit' => '#2563EB',
            'alpha' => '#DC2626',
            default => '#94A3B8',
        };
    }

    public function getStatusBgAttribute(): string
    {
        return match ($this->status) {
            'hadir' => '#ECFDF5',
            'izin'  => '#FFFBEB',
            'sakit' => '#EFF6FF',
            'alpha' => '#FEF2F2',
            default => '#F1F5F9',
        };
    }
}
