<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use App\Ekskul;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use Throwable;
use File;
use App\User;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $ekskul = Ekskul::all();
        return view('siswa.create', compact('kelas', 'ekskul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        $request->validated();
        try{
            $data = Siswa::create($request->except('foto'));
            if ($request->hasFile('foto')) {
                $uploaded_image = $request->file('foto');
                $extension = $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $filename = md5(microtime()) . '.' . $extension;
                $uploaded_image->move($destinationPath, $filename);
                $data->foto = $filename;
                $data->save();
            }
                if($data){
                    $user = User::updateOrCreate(
                        [
                        'email' => $request->email
                        ],
                        [
                            'name' => $request->nama,
                            'role_id' => 2,
                            'password' => bcrypt($request->password),
                        ]
                );
            }
            $success=true;
            $status = 'Siswa Berhasil di Buat';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('siswa.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $ekskul = Ekskul::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'ekskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaRequest $request, Siswa $siswa)
    {
        $request->validated();
        try{
            $oldFileName = $siswa->foto;
            $siswa->update($request->except('foto'));
            if ($request->hasFile('foto')) {
                $uploaded_image = $request->file('foto');
                $extension = $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $filename = md5(microtime()) . '.' . $extension;
                $uploaded_image->move($destinationPath, $filename);
                $siswa->foto = $filename;
                if($siswa->update()){
                    if(File::exists($destinationPath . '/' . $oldFileName)) {
                        File::delete($destinationPath . '/' . $oldFileName);
                    }
                }
            }
            if(!empty($request->password)){
                $user = User::updateOrCreate(
                    [
                    'email' => $request->email
                    ],
                    [
                        'name' => $request->nama,
                        'role_id' => 2,
                        'password' => bcrypt($request->password),
                    ]
                );
                // $user->password = bcrypt($request->password);
                // $user->update();
            }
            $success=true;
            $status = 'Siswa Berhasil di Perbarui';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('siswa.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        try{
            $user = User::where('email', $siswa->email)->first();
            if($siswa->delete()){
                $user->delete();
            }
            $success=true;
            $status = 'Siswa Berhasil di Hapus';
        }catch(Throwable $e){
            $success=false;
            $status = $e->getMessage();
        }
        return redirect()->route('siswa.index')->with('status', $status)->with('success', $success);
    }
}
