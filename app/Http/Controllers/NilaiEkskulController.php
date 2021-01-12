<?php

namespace App\Http\Controllers;

use App\NilaiEkskul;
use App\Semester;
use App\Kelas;
use App\Mapel;
use App\Ekskul;
use App\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\NilaiEkskulRequest;
use Throwable;

class NilaiEkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = NilaiEkskul::all();
        return view('nilai-ekskul.index', compact('nilai'));
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
        $ekskul = Ekskul::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('nilai-ekskul.create', compact('semester', 'mapel', 'kelas', 'siswa', 'ekskul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaiEkskulRequest $request)
    {
        $request->validated();
        try{
            NilaiEkskul::create($request->all());
            $success=true;
            $status = 'Nilai Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai-ekskul.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NilaiEkskul  $nilaiEkskul
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiEkskul $nilai_ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NilaiEkskul  $nilaiEkskul
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiEkskul $nilai_ekskul)
    {
        $nilai = $nilai_ekskul;
        $semester = Semester::all();
        $mapel = Mapel::all();
        $ekskul = Ekskul::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('nilai-ekskul.edit', compact('nilai', 'semester', 'mapel', 'kelas', 'siswa', 'ekskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NilaiEkskul  $nilaiEkskul
     * @return \Illuminate\Http\Response
     */
    public function update(NilaiEkskulRequest $request, NilaiEkskul $nilai_ekskul)
    {
        $request->validated();
        try{
            $nilai_ekskul->update($request->all());
            $success=true;
            $status = 'Nilai Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai-ekskul.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NilaiEkskul  $nilaiEkskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiEkskul $nilai_ekskul)
    {
        try{
            $nilai_ekskul->delete();
            $success=true;
            $status = 'Nilai Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai-ekskul.index')->with('status', $status)->with('success', $success);
    }
}
