<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat')->unique();
            $table->string('kategori')->index();
            $table->unsignedInteger('stok')->default(0); // stok tidak boleh minus
            $table->decimal('harga', 12, 2)->default(0); // aman dari null
            $table->date('tanggal_kadaluarsa')->nullable(); // kadang belum diisi saat input awal
            $table->string('satuan', 50)->default('tablet'); // tambahan biar jelas satuannya
            $table->text('keterangan')->nullable(); // opsional deskripsi obat
            $table->string('upload_gambar')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
