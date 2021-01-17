<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiSikap extends Model
{
    protected $fillable = [
        'semester_id',
        'kelas_id',
        'siswa_id',
        'akhlak',
        'kerajinan',
        'kedisiplinan',
        'kebersihan_dan_kerapihan',
        'keterangan'
    ];

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }
}
