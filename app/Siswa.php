<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends BaseModel
{
    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }

    public function nama() {
        return $this->hasMany('App\Tabungan', 'nis', 'nis');
    }
}
