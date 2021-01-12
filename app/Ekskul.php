<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $fillable = [
        'name',
        'nama_singkat'
    ];


    public function siswas()
    {
        return $this->hasMany('App\Siswa');
    }
}
