<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Kelas;
use App\Mapel;
use App\Guru;
use Illuminate\Http\Request;
use App\Http\Requests\JadwalRequest;
use Throwable;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hari = ['senin', 'selasa', 'rabu', 'kamis', "jumat", 'sabtu'];
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        return view('jadwal.create', compact('hari', 'kelas', 'mapel', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        $request->validated();
        try{
            Jadwal::create($request->all());
            $success=true;
            $status = 'Jadwal Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('jadwal.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $hari = ['senin', 'selasa', 'rabu', 'kamis', "jumat", 'sabtu'];
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        return view('jadwal.edit', compact('jadwal', 'hari', 'kelas', 'mapel', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, Jadwal $jadwal)
    {
        $request->validated();
        try{
            $jadwal->update($request->all());
            $success=true;
            $status = 'Jadwal Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('jadwal.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        try{
            $jadwal->delete();
            $success=true;
            $status = 'Jadwal Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('jadwal.index')->with('status', $status)->with('success', $success);
    }
}
