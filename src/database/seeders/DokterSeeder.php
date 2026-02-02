<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'dr. Andi Saputra',
                'spesialis' => 'Umum',
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Kesehatan No. 1, Jakarta',
                'foto' => null,
            ],
            [
                'nama' => 'dr. Sinta Maharani',
                'spesialis' => 'Anak',
                'no_telp' => '081234567891',
                'alamat' => 'Jl. Melati No. 5, Bandung',
                'foto' => null,
            ],
            [
                'nama' => 'dr. Budi Hartono',
                'spesialis' => 'Gigi',
                'no_telp' => '081234567892',
                'alamat' => 'Jl. Mawar No. 10, Surabaya',
                'foto' => null,
            ],
            [
                'nama' => 'dr. Rina Lestari',
                'spesialis' => 'Kandungan',
                'no_telp' => '081234567893',
                'alamat' => 'Jl. Kenanga No. 7, Yogyakarta',
                'foto' => null,
            ],
            [
                'nama' => 'dr. Fahmi Pratama',
                'spesialis' => 'Penyakit Dalam',
                'no_telp' => '081234567894',
                'alamat' => 'Jl. Anggrek No. 15, Medan',
                'foto' => null,
            ],
        ];

        foreach ($data as $dokter) {
            // Kita gunakan 'nama' sebagai kunci unik untuk updateOrCreate
            Dokter::updateOrCreate(
                ['nama' => $dokter['nama']],
                [
                    'spesialis' => $dokter['spesialis'],
                    'no_telp'   => $dokter['no_telp'],
                    'alamat'    => $dokter['alamat'],
                    'foto'      => $dokter['foto'],
                ]
            );
        }

        $this->command->info('DokterSeeder berhasil dijalankan sesuai migration!');
    }
}
