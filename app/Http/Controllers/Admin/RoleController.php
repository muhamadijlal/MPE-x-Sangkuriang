<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::orderBy('id','DESC')->get();
        return view('layouts.admin.role.index',compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'jenis' => ['required'],
            'upah' => ['required','numeric','digits:2'],
            'keterangan' => ['required'],
        ]);

        Role::create([
            'jenis' => $request->jenis ,
            'upah' => $request->upah ,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success','Role berhasil ditambahkan!');
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();

        return back()->with('success','Role berhasil dihapus!');
    }
}