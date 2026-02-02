<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'no_rm',
        'nik',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kota',
        'provinsi',
        'telepon',
        'email',
        'golongan_darah',
        'pekerjaan',
        'status_pernikahan',
        'upload_gambar',
    ];
}
