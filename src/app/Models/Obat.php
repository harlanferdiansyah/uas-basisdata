<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    protected $fillable = [
        'nama_obat',
        'kategori',
        'stok',
        'harga',
        'tanggal_kadaluarsa',
    ];

    protected $casts = [
        'tanggal_kadaluarsa' => 'date',
        'harga' => 'decimal:2',
    ];
}
