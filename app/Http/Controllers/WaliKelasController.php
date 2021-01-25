<?php

namespace App\Http\Controllers;

use App\WaliKelas;
use App\Kelas;
use App\Guru;
use Illuminate\Http\Request;
use App\Http\Requests\WaliKelasRequest;
use Throwable;
use File;

class WaliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waliKelas = WaliKelas::all();
        return view('wali-kelas.index', compact('waliKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        return view('wali-kelas.create', compact('kelas', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WaliKelasRequest $request)
    {
        $request->validated();
        try{
            $success=true;
            $status = 'Wali Kelas Berhasil di Buat';
            $data = WaliKelas::create($request->except('ttd'));
            if ($request->hasFile('ttd')) {
                    $uploaded_image = $request->file('ttd');
                    $extension = $uploaded_image->getClientOriginalExtension();
                    $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                    $filename = md5(microtime()) . '.' . $extension;
                    $uploaded_image->move($destinationPath, $filename);
                    $data->ttd = $filename;
                    $data->save();
            }
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('wali-kelas.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function show(WaliKelas $waliKelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function edit(WaliKelas $waliKela)
    {
        $waliKelas = $waliKela;
        $kelas = Kelas::all();
        $guru = Guru::all();
        return view('wali-kelas.edit', compact('waliKelas', 'kelas', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function update(WaliKelasRequest $request, WaliKelas $waliKela)
    {
        $request->validated();
        try{
            $success=true;
            $status = 'Wali Kelas Berhasil di Perbarui';
            $oldFileName = $waliKela->ttd;
            $waliKela->update($request->except('ttd'));
            if ($request->hasFile('ttd')) {
                $uploaded_image = $request->file('ttd');
                $extension = $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $filename = md5(microtime()) . '.' . $extension;
                $uploaded_image->move($destinationPath, $filename);
                $waliKela->ttd = $filename;
                if($waliKela->update()){
                    if(File::exists($destinationPath . '/' . $oldFileName)) {
                        File::delete($destinationPath . '/' . $oldFileName);
                    }
                }
            }

        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('wali-kelas.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaliKelas $waliKela)
    {
        $fileName = public_path() . DIRECTORY_SEPARATOR . 'img/' . $waliKela->ttd;
        try{
            if($waliKela->delete()){
                if(File::exists($fileName)) {
                    File::delete($fileName);
                }
            }
            $success=true;
            $status = 'Wali Kelas Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('wali-kelas.index')->with('status', $status)->with('success', $success);
    }
}
