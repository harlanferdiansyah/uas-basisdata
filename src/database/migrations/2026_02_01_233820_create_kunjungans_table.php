<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pasien_id')
                ->constrained('pasiens')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('jadwal_praktek_id')
                ->constrained('jadwal_prakteks')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->date('tanggal_kunjungan');
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();

            $table->enum('status_kunjungan', [
                'menunggu',
                'diperiksa',
                'selesai',
                'dibatalkan'
            ])->default('menunggu');

            $table->unsignedInteger('nomor_antrian')->nullable();
            $table->time('jam_datang')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->text('catatan_tambahan')->nullable();

            $table->timestamps();

            // Index untuk laporan & pencarian
            $table->index(['tanggal_kunjungan', 'status_kunjungan']);
            $table->index('pasien_id');
            $table->index('jadwal_praktek_id');
            $table->string('upload_gambar')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
