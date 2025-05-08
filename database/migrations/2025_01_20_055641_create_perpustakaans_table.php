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
        Schema::create('perpustakaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perpustakaan');
            $table->string('nama_pustakawan');
            $table->string('alamat');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpustakaans');
    }
};
