<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('no_pendaftaran');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('profil');
            $table->string('sekolah');
            $table->string('nisn');
            $table->string('alamat_sekolah');
            $table->string('ijazah');
            $table->string('no_ijazah');
            $table->string('akta');
            $table->string('kk');
            $table->string('nama_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_orangtua');
            $table->integer('jurusan_id');
            $table->year('tahun_masuk');
            $table->integer('validasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
