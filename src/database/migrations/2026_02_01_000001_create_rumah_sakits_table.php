<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rumah_sakits', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rs', 20)->unique();
            $table->string('nama_rs');
            $table->text('alamat');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('telepon', 20);
            $table->string('email')->nullable();
            $table->enum('tipe_rs', ['A', 'B', 'C', 'D'])->default('C');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->string('upload_gambar')->nullable();

            $table->timestamps();

            // Index tambahan biar pencarian cepat
            $table->index('nama_rs');
            $table->index('kota');
            $table->index('provinsi');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rumah_sakits');
    }
};
