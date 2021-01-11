<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'jenis_kelamin',
        'mapel_id',
        'hp',
        'jenjang_pendidikan',
        'foto'
    ];

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }
}
