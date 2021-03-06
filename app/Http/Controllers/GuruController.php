<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Mapel;
use Illuminate\Http\Request;
use App\Http\Requests\GuruRequest;
use Throwable;
use File;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        return view('guru.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruRequest $request)
    {
        $request->validated();
        try{
            $data = Guru::create($request->except('foto'));
            if ($request->hasFile('foto')) {
                $uploaded_image = $request->file('foto');
                $extension = $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $filename = md5(microtime()) . '.' . $extension;
                $uploaded_image->move($destinationPath, $filename);
                $data->foto = $filename;
                $data->save();
            }
            $success=true;
            $status = 'Guru Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('guru.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        $mapel = Mapel::all();
        return view('guru.edit', compact('guru', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(GuruRequest $request, Guru $guru)
    {
        $request->validated();
        try{
            $oldFileName = $guru->foto;
            $guru->update($request->except('foto'));
            if ($request->hasFile('foto')) {
                $uploaded_image = $request->file('foto');
                $extension = $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $filename = md5(microtime()) . '.' . $extension;
                $uploaded_image->move($destinationPath, $filename);
                $guru->foto = $filename;
                if($guru->update()){
                    if(File::exists($destinationPath . '/' . $oldFileName)) {
                        File::delete($destinationPath . '/' . $oldFileName);
                    }
                }
            }
            $success=true;
            $status = 'Guru Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('guru.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        try{
            $guru->delete();
            $success=true;
            $status = 'Guru Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('guru.index')->with('status', $status)->with('success', $success);
    }
}
