<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    protected $fillable = ['kode_pengarang', 'gelar_depan', 'nama_pengarang', 'gelar_belakang', 'no_telp', 'email', 'website', 'biografi', 'keterangan'];
}
