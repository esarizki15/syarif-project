<?php

namespace App\Http\Controllers;

use App\Kehadiran;
use App\Semester;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\KehadiranRequest;
use Throwable;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kehadiran = Kehadiran::all();
        return view('kehadiran.index', compact('kehadiran'));
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
        return view('kehadiran.create', compact('semester', 'kelas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KehadiranRequest $request)
    {
        $request->validated();
        try{
            Kehadiran::create($request->all());
            $success=true;
            $status = 'Kehadiran Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('kehadiran.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kehadiran $kehadiran)
    {
        $semester = Semester::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('kehadiran.edit', compact('kehadiran', 'semester', 'kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(KehadiranRequest $request, Kehadiran $kehadiran)
    {
        $request->validated();
        try{
            $kehadiran->update($request->all());
            $success=true;
            $status = 'Kehadiran Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('kehadiran.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kehadiran $kehadiran)
    {
        try{
            $kehadiran->delete();
            $success=true;
            $status = 'Kehadiran Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('kehadiran.index')->with('status', $status)->with('success', $success);
    }
}
