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
        Schema::create('pengarangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengarang');
            $table->string('gelar_depan')->nullable();
            $table->string('nama_pengarang');
            $table->string('gelar_belakang')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('biografi')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengarangs');
    }
};
