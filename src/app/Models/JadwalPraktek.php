<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPraktek extends Model
{
    use HasFactory;

    protected $table = 'jadwal_prakteks';

    protected $fillable = [
        'dokter_id',
        'poliklinik_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan_praktek',
        'kuota_pasien',
        'status',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }
}
