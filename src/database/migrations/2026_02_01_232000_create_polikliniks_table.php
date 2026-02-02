<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('polikliniks', function (Blueprint $table) {
            $table->id();

            // FK ke rumah sakit
            $table->foreignId('rumah_sakit_id')
                ->constrained('rumah_sakits')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('kode_poli', 20)->unique()->index();
            $table->string('nama_poli')->index();
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();

            // Format time harus HH:MM:SS
            $table->time('jam_buka')->default('08:00:00');
            $table->time('jam_tutup')->default('16:00:00');

            $table->enum('status', ['aktif','nonaktif'])->default('aktif')->index();

            $table->string('upload_gambar')->nullable();
            

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('polikliniks');
    }
};
