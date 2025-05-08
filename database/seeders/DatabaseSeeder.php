<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Perpustakaan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'status' => 'success',
        ]);

        Perpustakaan::create([
            'nama_perpustakaan' => 'Perpustakaan SMK Antartika 1 Sidoarjo',
            'nama_pustakawan' => 'Mulyono',
            'alamat' => 'Jalan Raya Siwalan Panji, Bedrek, Siwalanpanji, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61252',
            'no_telp' => '0318962851',
            'email' => 'antrek@gmail.com',
            'website' => 'www.smkantartika1sda.sch.id',
            'keterangan' => 'Aplikasi Perpustakaan Smk Antartika 1 Sidoarjo.',
        ]);
    }
}
