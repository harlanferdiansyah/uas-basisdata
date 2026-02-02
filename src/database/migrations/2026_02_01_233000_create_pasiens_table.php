<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();

            $table->string('no_rm', 20)->unique()->index(); // nomor rekam medis
            $table->string('nik', 16)->unique()->index();   // NIK KTP

            $table->string('nama_lengkap')->index();
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P'])->index();

            $table->text('alamat');
            $table->string('kota', 100)->index();
            $table->string('provinsi', 100)->index();
            $table->string('telepon', 20)->nullable();
            $table->string('email')->nullable();

            $table->enum('golongan_darah', ['A','B','O','AB'])->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->enum('status_pernikahan', ['Belum Menikah','Menikah'])
                  ->default('Belum Menikah');

            $table->string('upload_gambar')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
