<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RumahSakit;

class RumahSakitSeeder extends Seeder
{
    public function run(): void
    {
        RumahSakit::updateOrCreate(
            ['kode_rs' => 'RS001'],
            [
                'nama_rs' => 'RS Umum Pusat',
                'alamat' => 'Jl. Kesehatan No. 123',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'telepon' => '021123456',
                'email' => 'admin@rsup.com',
                'status' => 'Aktif',
                'tipe_rs' => 'A',
            ]
        );
    }
}
