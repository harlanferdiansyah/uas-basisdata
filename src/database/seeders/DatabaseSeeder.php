<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([

            // MASTER DATA
            RoleSeeder::class,
            UserSeeder::class,
            RumahSakitSeeder::class,
            PoliklinikSeeder::class, // Naik ke sini
            DokterSeeder::class,
            PasienSeeder::class,
            ObatSeeder::class,

            // DATA TRANSAKSI (Butuh ID dari tabel di atas)
            JadwalPraktekSeeder::class,
            KunjunganSeeder::class,
            ResepSeeder::class,

        ]);
    }
}
