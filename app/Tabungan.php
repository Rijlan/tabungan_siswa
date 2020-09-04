<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends BaseModel
{
    public function siswa() {
        return $this->belongsTo('App\Siswa', 'nis', 'nis');
    }
}
