<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\NilaiEkskul;
use App\NilaiSikap;
use App\Kehadiran;
use Throwable;
class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all()->unique('siswa_id');
        return view('raport.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = Nilai::find($id);
        $dataNilai = Nilai::where('siswa_id', $nilai->siswa_id)->where('semester_id', $nilai->semester_id)->where('kelas_id', $nilai->kelas_id)->get();
        $dataEkskul = NilaiEkskul::where('siswa_id', $nilai->siswa_id)->where('semester_id', $nilai->semester_id)->where('kelas_id', $nilai->kelas_id)->get();
        $dataSikap = NilaiSikap::where('siswa_id', $nilai->siswa_id)->where('semester_id', $nilai->semester_id)->where('kelas_id', $nilai->kelas_id)->first();
        $dataKehadiran = Kehadiran::where('siswa_id', $nilai->siswa_id)->where('semester_id', $nilai->semester_id)->where('kelas_id', $nilai->kelas_id)->first();
        return view('raport.print', compact('nilai', 'dataNilai', 'dataEkskul', 'dataSikap', 'dataKehadiran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $nilai = Nilai::find($id);
            $nilai->update($request->all());
            $success=true;
            $status = 'Izin Download Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('raport.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
