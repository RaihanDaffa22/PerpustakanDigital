<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pustaka;
use App\Models\Anggota;

class Transaksi extends Model
{
    protected $fillable = ['id_pustaka', 'id_anggota', 'tgl_pinjam', 'tgl_kembali', 'tgl_pengembalian', 'fp', 'keterangan'];

    public function pustaka(){
        return $this->belongsTo(Pustaka::class, 'id_pustaka');
    }
    
    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
