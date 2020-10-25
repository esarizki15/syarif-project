<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$roles = role::all();
	return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10'
        ]);
        $status = 'Role stored!';
        $success = true;
        try{
            $role = Role::create($request->all());
        }catch(\RuntimeException $e){
            $status = $e->getMessage();
            $success = false;
        }

        return redirect()->route('role.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
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
        $request->validate([
            'name' => 'required|max:10'
            ]);
        $role = Role::find($id);
        $status = 'Role updated!';
        $success = true;
        try{
            $role->update($request->all());
        }catch(\RuntimeException $e){
            $status = $e->getMessage();
            $success = false;
        }
        return redirect()->route('role.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $status = 'Role deleted!';
        $success = true;
        try {
            $role->delete();
        }catch(\RuntimeException $e){
            $status = $e->getMessage();
            $success = false;
        }
        return redirect()->route('role.index')->with('status', $status)->with('success', $success);
    }
}
