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
        Schema::create('penerbits', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penerbit');
            $table->string('nama_penerbit');
            $table->string('alamat_penerbit')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('kontak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbits');
    }
};
