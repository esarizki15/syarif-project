<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'ttl',
        'ttd',
        'jenis_kelamin',
        'kelas_id',
        'email',
        'hp',
        'jenjang_pendidikan',
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
