<?php

namespace App\Models;
use App\Models\Rak;

use Illuminate\Database\Eloquent\Model;

class Ddc extends Model
{
    protected $fillable = ['id_rak', 'kode_ddc', 'ddc', 'keterangan'];

    public function rak(){
        return $this->belongsTo(Rak::class, 'id_rak');
    }
}
