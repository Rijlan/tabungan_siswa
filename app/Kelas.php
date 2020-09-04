<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends BaseModel
{
    public function siswas() {
        return $this->hasMany('App\Siswa');
    }
}
