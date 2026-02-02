<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'reseps';

    protected $fillable = [
        'kunjungan_id',
        'tanggal_resep',
        'catatan_dokter',
        'status',
    ];

    protected $casts = [
        'tanggal_resep' => 'date',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }
}
