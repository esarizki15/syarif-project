<?php

namespace App\Http\Controllers;

use App\Ekskul;
use Illuminate\Http\Request;
use App\Http\Requests\EkskulRequest;
use Throwable;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekskul = Ekskul::all();
        return view('ekskul.index', compact('ekskul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ekskul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EkskulRequest $request)
    {
        $request->validated();
        try{
            Ekskul::create($request->all());
            $success=true;
            $status = 'Ekskul Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('ekskul.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show(Ekskul $ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekskul $ekskul)
    {
        return view('ekskul.edit', compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(EkskulRequest $request, Ekskul $ekskul)
    {
        $request->validated();
        try{
            $ekskul->update($request->all());
            $success=true;
            $status = 'Ekskul Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('ekskul.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekskul $ekskul)
    {
        try{
            $ekskul->delete();
            $success=true;
            $status = 'Ekskul Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('ekskul.index')->with('status', $status)->with('success', $success);
    }
}
