<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_obat' => 'Paracetamol',      'kategori' => 'Analgesik',      'stok' => 100, 'harga' => 5000.00,  'tanggal_kadaluarsa' => '2027-12-31'],
            ['nama_obat' => 'Amoxicillin',      'kategori' => 'Antibiotik',     'stok' => 50,  'harga' => 15000.00, 'tanggal_kadaluarsa' => '2026-10-10'],
            ['nama_obat' => 'Ibuprofen',        'kategori' => 'Anti Inflamasi', 'stok' => 80,  'harga' => 8000.00,  'tanggal_kadaluarsa' => '2027-08-20'],
            ['nama_obat' => 'CTM',              'kategori' => 'Antihistamin',   'stok' => 120, 'harga' => 4000.00,  'tanggal_kadaluarsa' => '2028-01-15'],
            ['nama_obat' => 'Asam Mefenamat',   'kategori' => 'Analgesik',      'stok' => 60,  'harga' => 7000.00,  'tanggal_kadaluarsa' => '2027-05-05'],
            ['nama_obat' => 'Ciprofloxacin',    'kategori' => 'Antibiotik',     'stok' => 40,  'harga' => 18000.00, 'tanggal_kadaluarsa' => '2026-11-11'],
            ['nama_obat' => 'Vitamin C',        'kategori' => 'Vitamin',        'stok' => 150, 'harga' => 3000.00,  'tanggal_kadaluarsa' => '2028-06-30'],
            ['nama_obat' => 'OBH Combi',        'kategori' => 'Obat Batuk',     'stok' => 70,  'harga' => 12000.00, 'tanggal_kadaluarsa' => '2027-09-09'],
            ['nama_obat' => 'Antasida DOEN',    'kategori' => 'Obat Lambung',   'stok' => 90,  'harga' => 6000.00,  'tanggal_kadaluarsa' => '2028-02-02'],
            ['nama_obat' => 'Salbutamol',       'kategori' => 'Obat Asma',      'stok' => 55,  'harga' => 20000.00, 'tanggal_kadaluarsa' => '2027-07-07'],
        ];

        foreach ($data as $obat) {
            Obat::updateOrCreate(
                ['nama_obat' => $obat['nama_obat']], // cek unik berdasarkan nama obat
                $obat
            );
        }
    }
}
