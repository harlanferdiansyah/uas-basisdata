<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\JadwalPraktek;

class KunjunganSeeder extends Seeder
{
    public function run(): void
    {
        $pasiens = Pasien::all();
        $jadwals = JadwalPraktek::all();

        if ($pasiens->isEmpty() || $jadwals->isEmpty()) {
            $this->command->error('Pasien atau Jadwal kosong!');
            return;
        }

        foreach (range(1, 5) as $index) {
            Kunjungan::create([
                'pasien_id' => $pasiens->random()->id,
                'jadwal_praktek_id' => $jadwals->random()->id,
                'tanggal_kunjungan' => now()->subDays(rand(0, 10)),
                'keluhan' => 'Keluhan contoh ke-' . $index,
                'status_kunjungan' => 'menunggu',
                'nomor_antrian' => $index,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
