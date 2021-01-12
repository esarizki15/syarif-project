<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Semester;
use App\Kelas;
use App\Mapel;
use App\Siswa;
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
            Nilai::create($request->all());
            $success=true;
            $status = 'Nilai Berhasil di Buat';
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
            $nilai->update($request->all());
            $success=true;
            $status = 'Nilai Berhasil di Perbarui';
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
            $nilai->delete();
            $success=true;
            $status = 'Nilai Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai.index')->with('status', $status)->with('success', $success);
    }
}
