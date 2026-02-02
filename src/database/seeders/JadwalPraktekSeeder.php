<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Poliklinik;

class JadwalPraktekSeeder extends Seeder
{
    public function run(): void
    {
        $poli = Poliklinik::all();
        if ($poli->isEmpty()) {
            $this->command->error('Poliklinik kosong! Jalankan PoliklinikSeeder dulu.');
            return;
        }

        $dokters = Dokter::limit(5)->get();
        if ($dokters->isEmpty()) {
            $this->command->error('Dokter kosong! Jalankan DokterSeeder dulu.');
            return;
        }

        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        foreach ($dokters as $key => $dokter) {
            DB::table('jadwal_prakteks')->insert([
                'dokter_id' => $dokter->id,
                'poliklinik_id' => $poli[$key % $poli->count()]->id,
                'hari' => $haris[$key % 5],
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
                'ruangan_praktek' => 'Ruang ' . (101 + $key),
                'kuota_pasien' => 20,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
