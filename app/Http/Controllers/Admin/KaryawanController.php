<?php

namespace App\Http\Controllers\Admin;

use App\Models\Karyawan;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(){
        return view('layouts.admin.karyawan.index');
    }

    public function datatable(){
        $collections = Karyawan::orderBy('id','DESC')->get();
        return datatables()
                ->of($collections)
                ->addColumn('','')
                ->addColumn('role', function($row){
                    return $row->role->jenis;
                })
                ->addColumn('aksi', function($row){
                    return '
                    <a href="/admin/karyawan/edit/'.$row->id.'" class="btn btn-outline-warning btn-icon-text p-2">
                        Edit
                    </a>
                    <button onclick="confirmDelete('.$row->id.')" type="button" class="btn btn-outline-danger btn-icon-text p-2">
                        Delete
                    </button>
                    ';
                })
                ->rawColumns([
                    '',
                    'role',
                    'aksi'
                ])
                ->make(true);
    }

    public function create(){
        $roles = Role::all('id','jenis');
        return view('layouts.admin.karyawan.create', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'telepon' => ['required','numeric'],
            'role' => ['required']
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'role_id' => $request->role
        ]);

        return redirect()->route('admin.karyawan.index')->with('success','Karyawan berhasil ditambahkan!');
    }

    public function edit($id){
        $karyawan = Karyawan::findOrFail($id);
        $roles = Role::all('id','jenis');
        return view('layouts.admin.karyawan.edit', compact('karyawan','roles'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'telepon' => ['required','numeric'],
            'role' => ['required']
        ]);

        Karyawan::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'role_id' => $request->role
        ]);

        return redirect()->route('admin.karyawan.index')->with('success','Karyawan berhasil diupdate!');
    }

    public function destroy($id){
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('admin.karyawan.index')->with('success','Karyawan berhasil didelete!');
    }
}
