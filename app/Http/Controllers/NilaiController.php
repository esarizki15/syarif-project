<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\NilaiTotal;
use App\Semester;
use App\Kelas;
use App\Mapel;
use App\Siswa;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\NilaiRequest;
use Throwable;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all();
        // if(Auth::user()->role_id == 2){
        //     $nilai = Nilai::where('siswa_id', Auth::user()->id)->get();
        // }
        return view('nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::all();
        $mapel = Mapel::all();
        // $siswa = User::where('role_id', 2)->get();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('nilai.create', compact('semester', 'mapel', 'kelas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaiRequest $request)
    {
        $request->validated();
        try{
            $success=true;
            $status = 'Nilai Berhasil di Buat';
            $nilai = Nilai::updateOrCreate(
                [
                    'semester_id' =>  $request->semester_id,
                    'kelas_id' =>  $request->kelas_id,
                    'siswa_id' =>  $request->siswa_id,
                    'mapel_id' =>  $request->mapel_id,
                ],
                $request->all()
            );
            if($nilai){
                $nilaiSiswa = Nilai::where('siswa_id', $nilai->siswa_id)->where('semester_id', $nilai->semester_id)->where('kelas_id', $nilai->kelas_id)->get();
                $sumTugas = $nilaiSiswa->sum('tugas');
                $sumUts = $nilaiSiswa->sum('uts');
                $sumUas = $nilaiSiswa->sum('uas');
                $total = $sumTugas + $sumUts + $sumUas;
                
                $nilaiTotal = NilaiTotal::updateOrCreate(
                    [
                        'semester_id' =>  $nilai->semester_id,
                        'kelas_id' =>  $nilai->kelas_id,
                        'siswa_id' =>  $nilai->siswa_id,
                    ],
                    [
                        'nilai' => $total
                    ]
                );
            }
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $semester = Semester::all();
        $mapel = Mapel::all();
        // $siswa = User::where('role_id', 2)->get();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('nilai.edit', compact('nilai', 'semester', 'mapel', 'kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(NilaiRequest $request, Nilai $nilai)
    {
        $request->validated();
        try{
            $success=true;
            $status = 'Nilai Berhasil di Perbarui';
            $data = $nilai->update($request->all());
            if($data){
                $nilaiSiswa = Nilai::where('siswa_id', $nilai->siswa_id)->where('semester_id', $nilai->semester_id)->where('kelas_id', $nilai->kelas_id)->get();
                $sumTugas = $nilaiSiswa->sum('tugas');
                $sumUts = $nilaiSiswa->sum('uts');
                $sumUas = $nilaiSiswa->sum('uas');
                $total = $sumTugas + $sumUts + $sumUas;
                
                $nilaiTotal = NilaiTotal::updateOrCreate(
                    [
                        'semester_id' =>  $nilai->semester_id,
                        'kelas_id' =>  $nilai->kelas_id,
                        'siswa_id' =>  $nilai->siswa_id,
                    ],
                    [
                        'nilai' => $total
                    ]
                );
            }
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        try{
            $oldNilai = $nilai;
            $success=true;
            $status = 'Nilai Berhasil di Hapus';
            $deleted = $nilai->delete();
            if($deleted){
                $nilaiSiswa = Nilai::where('siswa_id', $oldNilai->siswa_id)->where('semester_id', $oldNilai->semester_id)->where('kelas_id', $oldNilai->kelas_id)->get();
                
                if(!empty($nilaiSiswa)){
                    $sumTugas = $nilaiSiswa->sum('tugas');
                    $sumUts = $nilaiSiswa->sum('uts');
                    $sumUas = $nilaiSiswa->sum('uas');
                    $total = $sumTugas + $sumUts + $sumUas;
                    $nilaiTotal = NilaiTotal::updateOrCreate(
                        [
                            'semester_id' =>  $oldNilai->semester_id,
                            'kelas_id' =>  $oldNilai->kelas_id,
                            'siswa_id' =>  $oldNilai->siswa_id,
                        ],
                        [
                            'nilai' => $total
                        ]
                    );
                }else{
                    $nilaiTotal = NilaiTotal::where('nilai_id',$oldNilai->id)->first();
                    $nilaiTotal->delete();
                }
            }
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai.index')->with('status', $status)->with('success', $success);
    }
}
