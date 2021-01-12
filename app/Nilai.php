<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'semester_id',
        'kelas_id',
        'mapel_id',
        'siswa_id',
        'kkm',
        'tugas',
        'uts',
        'uas',
        'predikat'
    ];

    public function mean(){
        return ($this->tugas + $this->uas + $this->uts) / 3;
    }

    public function status()
    {
        if($this->mean() >= $this->kkm) return 'Lulus'; 
        return 'Tidak Lulus';
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }

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
