<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
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
        // 'predikat',
        'status'
    ];

    public function getReverseStatus()
    {
        if($this->status == 0) return 1;
        return 0;
    }

    public function getIzinDownload()
    {
        if($this->status == 0) return ucwords('ijinkan');
        return ucwords('block raport');
    }

    public function getStatusDownload()
    {
        if($this->status == 0) return ucwords('blok');
        return ucwords('bebas');
    }

    public function mean(){
        return round(($this->tugas + $this->uas + $this->uts) / 3);
    }

    public function terbilang()
    {
        $format = new \NumberFormatter("id", \NumberFormatter::SPELLOUT); 
        return ucwords($format->format($this->mean()));
    }
    
    public function status()
    {
        if($this->mean() >= $this->kkm) return 'Lulus'; 
        return 'Tidak Lulus';
    }

    public function deskripsi()
    {
        if ($this->mean() < $this->kkm) return 'Tidak Lulus';
        if(($this->mean() - $this->kkm) <= 2){
            return 'KKM Tercapai/Tuntas';
        }
        return 'KKM Terlampaui';
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
        // $user = User::find($this->siswa_id);
        // $siswa = Siswa::where('email', $user->email)->first(); 
        // return $siswa;
    }
}
