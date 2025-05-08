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
        Schema::create('pustakas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pustaka');
            $table->unsignedBigInteger('id_ddc');
            $table->unsignedBigInteger('id_format');
            $table->unsignedBigInteger('id_penerbit');
            $table->unsignedBigInteger('id_pengarang');
            $table->string('isbn');
            $table->string('judul_pustaka');
            $table->string('tahun_terbit');
            $table->string('keyword')->nullable();
            $table->string('keterangan_fisik')->nullable();
            $table->string('keterangan_tambahan')->nullable();
            $table->text('abstraksi')->nullable();
            $table->string('gambar')->nullable();
            $table->integer('harga_buku');
            $table->string('kondisi_buku');
            $table->enum('fp', ['0', '1']);
            $table->integer('jml_pinjam')->default('0');
            $table->integer('denda_terlambat');
            $table->integer('denda_hilang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pustakas');
    }
};
