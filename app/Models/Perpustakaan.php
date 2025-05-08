<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    protected $fillable = ['nama_perpustakaan', 'nama_pustakawan', 'alamat', 'email', 'website', 'no_telp', 'keterangan'];
}
