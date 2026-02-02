<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungans';

    protected $fillable = [
        'pasien_id',
        'jadwal_praktek_id',
        'tanggal_kunjungan',
        'keluhan',
        'diagnosa',
        'status_kunjungan',
        'nomor_antrian',
        'jam_datang',
        'jam_selesai',
        'catatan_tambahan',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }

    public function jadwalPraktek(): BelongsTo
    {
        return $this->belongsTo(JadwalPraktek::class);
    }
}
