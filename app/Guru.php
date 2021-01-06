<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'ttl',
        'email',
        'jenis_kelamin',
        'mapel_id',
        'hp',
        'jenjang_pendidikan',
    ];

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }
}
