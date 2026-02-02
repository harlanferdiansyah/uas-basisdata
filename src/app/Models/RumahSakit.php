<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'rumah_sakits';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'upload_gambar',
        'kode_rs',
        'nama_rs',
        'alamat',
        'kota',
        'provinsi',
        'telepon',
        'email',
        'status',
        'tipe_rs',
    ];
}
