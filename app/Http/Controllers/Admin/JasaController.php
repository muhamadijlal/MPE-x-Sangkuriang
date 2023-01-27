<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class JasaController extends Controller
{
    public function index(){
        return view('layouts.admin.jasa.index');
    }

    public function datatable(){
        $collection = DB::table('jasa')->get();
        return datatables()
                ->of($collection)
                ->addColumn('','')
                ->addColumn('aksi', function($collection){
                    return '
                        <a href="/admin/jasa/edit/'.$collection->id.'" class="btn btn-outline-warning btn-icon-text p-2">
                            Edit
                        </a>
                        <button onclick="confirmDelete('.$collection->id.')" type="button" class="btn btn-outline-danger btn-icon-text p-2">
                            Delete
                        </button>
                    ';
                })
                ->rawColumns([
                    'aksi'
                ])
                ->make(true);
    }

    public function create(){
        return view('layouts.admin.jasa.create');
    }

    public function store(Request $request){
        // dd($request);
        $validation = $request->validate(
            [
                'nama' => 'required',
                'keterangan' => 'required',
                'harga' => 'required'
            ]
        );
        DB::table('jasa')->insert([
            'nama' => $validation['nama'],
            'deskripsi' => $validation['keterangan'],
            'harga' => $validation['harga'],
            'created_at' => Carbon::now()
        ]);
        return redirect('/admin/jasa')->with('success','Data Berhasil Ditambahkan');
        
    }

    public function edit($id){
        $data = DB::table('jasa')->where('id',$id)->get();
        return view('layouts.admin.jasa.edit',compact('data'));
    }

    public function update(Request $request, $id){
        // dd($request);
        DB::table('jasa')->where('id',$id)->update([
            'nama' => $request['nama'],
            'deskripsi' => $request['keterangan'],
            'harga' => $request['harga'],
            'updated_at' => Carbon::now()
        ]);

        return redirect(route('admin.jasa.index'))->with('success','Data Berhasil Diubah');
    }

    public function destroy($id){
        DB::table('jasa')->where('id',$id)->delete();
        return redirect(route('admin.jasa.index'))->with('success','Data Berhasil Dihapus');
    }
}
