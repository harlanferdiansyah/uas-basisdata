<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_prakteks', function (Blueprint $table) {
            $table->id();

            // Foreign key HARUS unsignedBigInteger (foreignId sudah benar)
            $table->foreignId('dokter_id')
                ->constrained('dokters')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('poliklinik_id')
                ->constrained('polikliniks')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->enum('hari', [
                'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'
            ])->index(); // biar pencarian jadwal cepat

            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->string('ruangan_praktek')->nullable();
            $table->unsignedInteger('kuota_pasien')->default(20);
            $table->enum('status', ['aktif','libur'])->default('aktif');

            $table->timestamps();

            // Cegah jadwal bentrok
            $table->unique(
                ['dokter_id','hari','jam_mulai','jam_selesai'],
                'unik_jadwal_dokter'
            );

            // Index tambahan untuk performa
            $table->index('dokter_id');
            $table->index('poliklinik_id');
            $table->string('upload_gambar')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_prakteks');
    }
};
