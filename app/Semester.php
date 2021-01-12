<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'kode_semester',
        'nama_semester',
        'nama_tahun_ajar',
        'nama_tahun_pelajaran',
        'semester'
    ];
}
