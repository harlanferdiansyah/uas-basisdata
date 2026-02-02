<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kunjungan_id')
                ->constrained('kunjungans')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->date('tanggal_resep');
            $table->text('catatan_dokter')->nullable();
            $table->enum('status_resep', ['diproses','selesai','diambil'])->default('diproses');

            $table->timestamps();

            $table->index('kunjungan_id');
            $table->string('upload_gambar')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reseps'); // ✅ harus sama dengan yang dibuat di atas
    }
};
