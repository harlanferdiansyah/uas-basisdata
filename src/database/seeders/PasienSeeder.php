<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'no_rm' => 'RM20251025001',
                'nik' => '1234567890123456',
                'nama_lengkap' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1985-03-12',
                'alamat' => 'Jl. Melati No. 1',
                'kota' => 'Jakarta Barat',
                'provinsi' => 'DKI Jakarta',
                'telepon' => '081234567890',
                'email' => 'budi.santoso@email.com',
                'golongan_darah' => 'O',
                'pekerjaan' => 'Karyawan Swasta',
                'status_pernikahan' => 'Menikah',
                'upload_gambar' => null,
            ],
            [
                'no_rm' => 'RM20251025002',
                'nik' => '1234567890123457',
                'nama_lengkap' => 'Siti Aisyah',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1990-07-21',
                'alamat' => 'Jl. Mawar No. 2',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'telepon' => '081234567891',
                'email' => 'siti.aisyah@email.com',
                'golongan_darah' => 'A',
                'pekerjaan' => 'Guru',
                'status_pernikahan' => 'Menikah',
                'upload_gambar' => null,
            ],
            [
                'no_rm' => 'RM20251025003',
                'nik' => '1234567890123458',
                'nama_lengkap' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1978-11-05',
                'alamat' => 'Jl. Kenanga No. 10',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'telepon' => '081234567892',
                'email' => 'ahmad.fauzi@email.com',
                'golongan_darah' => 'B',
                'pekerjaan' => 'Wiraswasta',
                'status_pernikahan' => 'Menikah',
                'upload_gambar' => null,
            ],
            [
                'no_rm' => 'RM20251025004',
                'nik' => '1234567890123459',
                'nama_lengkap' => 'Dewi Lestari',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1995-02-14',
                'alamat' => 'Jl. Flamboyan No. 7',
                'kota' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'telepon' => '081234567893',
                'email' => 'dewi.lestari@email.com',
                'golongan_darah' => 'AB',
                'pekerjaan' => 'Mahasiswa',
                'status_pernikahan' => 'Belum Menikah',
                'upload_gambar' => null,
            ],
            [
                'no_rm' => 'RM20251025005',
                'nik' => '1234567890123460',
                'nama_lengkap' => 'Rizky Pratama',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1988-09-30',
                'alamat' => 'Jl. Anggrek No. 15',
                'kota' => 'Medan',
                'provinsi' => 'Sumatera Utara',
                'telepon' => '081234567894',
                'email' => 'rizky.pratama@email.com',
                'golongan_darah' => 'O',
                'pekerjaan' => 'Teknisi',
                'status_pernikahan' => 'Menikah',
                'upload_gambar' => null,
            ],
        ];

        foreach ($data as $pasien) {
            Pasien::firstOrCreate(
                ['nik' => $pasien['nik']], // unik
                $pasien
            );
        }
    }
}
