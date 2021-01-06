<?php

namespace App\Http\Controllers;

use App\Mapel;
use Illuminate\Http\Request;
use App\Http\Requests\MapelRequest;
use Throwable;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapelRequest $request)
    {
        $request->validated();
        try{
            Mapel::create($request->all());
            $success=true;
            $status = 'Mapel Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('mapel.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(MapelRequest $request, Mapel $mapel)
    {
        $request->validated();
        try{
            $mapel->update($request->all());
            $success=true;
            $status = 'Mapel Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('mapel.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        try{
            $mapel->delete();
            $success=true;
            $status = 'Mapel Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('mapel.index')->with('status', $status)->with('success', $success);
    }
}
