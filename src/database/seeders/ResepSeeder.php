<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kunjungan;

class ResepSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID kunjungan yang tersedia
        $kunjungans = Kunjungan::pluck('id')->toArray();

        if (empty($kunjungans)) {
            $this->command->error('Data Kunjungan kosong! Resep tidak bisa dibuat.');
            return;
        }

        $dataResep = [
            [
                'kunjungan_id'   => $kunjungans[0],
                'tanggal_resep'  => now()->format('Y-m-d'),
                'catatan_dokter' => 'Minum obat tepat waktu, istirahat cukup.',
                'status_resep'   => 'selesai',
            ],
            [
                'kunjungan_id'   => $kunjungans[min(1, count($kunjungans)-1)],
                'tanggal_resep'  => now()->format('Y-m-d'),
                'catatan_dokter' => 'Hindari makanan pedas sementara.',
                'status_resep'   => 'diproses',
            ],
            [
                'kunjungan_id'   => $kunjungans[min(2, count($kunjungans)-1)],
                'tanggal_resep'  => now()->subDay()->format('Y-m-d'),
                'catatan_dokter' => 'Kontrol kembali jika panas tidak turun.',
                'status_resep'   => 'diambil',
            ],
        ];

        foreach ($dataResep as $resep) {
            DB::table('reseps')->insert(array_merge($resep, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Seeder Resep (Header) berhasil dijalankan!');
    }
}
