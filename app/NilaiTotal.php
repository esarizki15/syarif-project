<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiTotal extends Model
{
    protected $fillable = [
        'semester_id',
        'kelas_id',
        'siswa_id',
        'nilai',
];
}
