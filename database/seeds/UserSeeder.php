<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Mapel;
use App\Ekskul;
use App\Kelas;
use App\Siswa;
use App\Semester;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = new Siswa();
        $siswa->nis = "112";
        $siswa->nama = "Jalal";
        $siswa->tempat_lahir = "tangerang";
        $siswa->tanggal_lahir = "02-09-1997";
        $siswa->nama_orang_tua = "tes";
        $siswa->email = "tes@gmail.com";
        $siswa->jenis_kelamin = "l";
        $siswa->kelas_id = "1";
        $siswa->ekskul_id = "1";
        $siswa->hp = "123423232";
        $siswa->alamat = "tes alamat";
        $siswa->save();
        
        $semester = new Semester();
        $semester->kode_semester = "111";
        $semester->nama_semester = "tes semester";
        $semester->nama_tahun_ajar = "tes tahun ajar";
        $semester->nama_tahun_pelajaran = "tes tahun pelajaran";
        $semester->semester = "1";
        $semester->save();

        $ekskul = new Ekskul();
        $ekskul->name = "Palang Merah Remaja";
        $ekskul->nama_singkat = "PMR";
        $ekskul->save();

        $mapel = new Mapel();
        $mapel->kode = "001";
        $mapel->name = "IPA";
        $mapel->save();
        
        $mapel = new Kelas();
        $mapel->kode = "001";
        $mapel->name = "X IPA";
        $mapel->save();
        
        $role = new Role();
        $role->name = "Admin";
        $role->save();

        $role1 = new Role();
        $role1->name = "Siswa";
        $role1->save();

        $role2 = new Role();
        $role2->name = "Guru";
        $role2->save();

        $role3 = new Role();
        $role3->name = "Wali Kelas";
        $role3->save();

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = $role->id; 
        $user->save();

        $user = new User();
        $user->name = "Siswa";
        $user->email = "siswa@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = $role1->id; 
        $user->save();

        $user = new User();
        $user->name = "Guru";
        $user->email = "guru@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = $role2->id; 
        $user->save();
    }
}
