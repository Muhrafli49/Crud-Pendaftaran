<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('sertifikat_vaksin')->nullable();

            // Umum
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->string('no_ktp');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');

            // Kontak
            $table->string('no_telp');
            $table->string('email');

            // Foto
            $table->string('foto')->nullable();

            // Alamat
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->text('alamat_lengkap');

            // Lain-lain
            $table->year('tahun_lulus');
            $table->string('pengalaman')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
