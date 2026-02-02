<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poliklinik;
use App\Models\RumahSakit;

class PoliklinikSeeder extends Seeder
{
    public function run(): void
    {
        $rs = RumahSakit::first();

        $polis = [
            ['nama_poli' => 'Poli Umum', 'kode_poli' => 'PL001'],
            ['nama_poli' => 'Poli Anak', 'kode_poli' => 'PL002'],
            ['nama_poli' => 'Poli Gigi', 'kode_poli' => 'PL003'],
            ['nama_poli' => 'Poli Kandungan', 'kode_poli' => 'PL004'],
            ['nama_poli' => 'Poli Penyakit Dalam', 'kode_poli' => 'PL005'],
        ];

        foreach ($polis as $poli) {
            Poliklinik::updateOrCreate(
                ['kode_poli' => $poli['kode_poli']],
                [
                    'rumah_sakit_id' => $rs->id,
                    'nama_poli' => $poli['nama_poli'],
                    'deskripsi' => 'Layanan ' . $poli['nama_poli'],
                    'lokasi' => 'Gedung A',
                    'jam_buka' => '08:00:00',
                    'jam_tutup' => '16:00:00',
                    'status' => 'Aktif',
                ]
            );
        }
    }
}
