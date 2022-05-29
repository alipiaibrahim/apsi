<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dospem extends Model
{
    public function mahasiswas(){
        return $this->belongsTo('App\Models\Mahasiswa', 'mahasiswas', 'id');
    }
    public function npm(){
        return $this->belongsTo('App\Models\Mahasiswa', 'npm', 'id');
    }
    public function dosens(){
        return $this->belongsTo('App\Models\Dosen', 'dosens', 'id');
    }
}
