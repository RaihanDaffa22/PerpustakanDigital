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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis_anggota');
            $table->string('kode_anggota');
            $table->string('nama_anggota');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->string('alamat', 50);
            $table->string('no_telp');
            $table->string('email');
            $table->date('tgl_daftar');
            $table->date('tgl_aktif');
            $table->enum('fa', ['Y', 'T']);
            $table->string('keterangan')->nullable();
            $table->string('foto');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
