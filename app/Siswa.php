<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_orang_tua',
        'email',
        'jenis_kelamin',
        'kelas_id',
        'ekskul_id',
        'hp',
        'alamat',
        'foto',
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
