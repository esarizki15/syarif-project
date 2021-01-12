<?php

namespace App\Http\Controllers;

use App\NilaiSikap;
use App\Semester;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\NilaiSikapRequest;
use Throwable;

class NilaiSikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = NilaiSikap::all();
        return view('nilai-sikap.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('nilai-sikap.create', compact('semester', 'kelas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaiSikapRequest $request)
    {
        $request->validated();
        try{
            NilaiSikap::create($request->all());
            $success=true;
            $status = 'Nilai Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai-sikap.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NilaiSikap  $nilaiSikap
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiSikap $nilai_sikap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NilaiSikap  $nilaiSikap
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiSikap $nilai_sikap)
    {
        $nilai = $nilai_sikap;
        $semester = Semester::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('nilai-sikap.edit', compact('nilai', 'semester', 'kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NilaiSikap  $nilaiSikap
     * @return \Illuminate\Http\Response
     */
    public function update(NilaiSikapRequest $request, NilaiSikap $nilai_sikap)
    {
        $request->validated();
        try{
            $nilai_sikap->update($request->all());
            $success=true;
            $status = 'Nilai Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai-sikap.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NilaiSikap  $nilaiSikap
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiSikap $nilai_sikap)
    {
        try{
            $nilai_sikap->delete();
            $success=true;
            $status = 'Nilai Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('nilai-sikap.index')->with('status', $status)->with('success', $success);
    }
}
