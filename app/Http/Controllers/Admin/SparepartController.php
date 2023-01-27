<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function index(){
        return view('layouts.admin.spareparts.index');
    }

    public function datatable(){
        $collection = Sparepart::orderBy('id','DESC')->get();
        return datatables()
                ->of($collection)
                ->addColumn('','')
                ->addColumn('aksi', function($row){
                    return '
                        <a href="/admin/sparepart/edit/'.$row->id.'" class="btn btn-outline-warning btn-icon-text p-2">
                            Edit
                        </a>
                        <button onclick="confirmDelete('.$row->id.')" type="button" class="btn btn-outline-danger btn-icon-text p-2">
                            Delete
                        </button>
                    ';
                })
                ->rawColumns([
                    '',
                    'aksi'
                ])
                ->make(true);
    }

    public function create(){
        return view('layouts.admin.spareparts.create');
    }

    public function edit($id){

        $sparepart = Sparepart::findOrFail($id);

        return view('layouts.admin.spareparts.edit',compact('sparepart'));
    }

    public function store(Request $request){

        // Validation request
        $request->validate([
            'nama' => ['required'],
            'merek' => ['required'],
            'type' => ['required'],
            'satuan' => ['required'],
            'qty' => ['required','numeric'],
            'harga' => ['required','numeric']
        ]);

        Sparepart::create([
            'nama' => $request->nama,
            'merek' => $request->merek,
            'type' => $request->type,
            'satuan' => $request->satuan,
            'qty' => $request->qty,
            'harga' => $request->harga
        ]);

        return redirect()->route('admin.sparepart.index')->with('success','Sparepart berhasil ditambahkan');
    }

    public function update(Request $request, $id){

        // Validation request
        $request->validate([
            'nama' => ['required'],
            'merek' => ['required'],
            'type' => ['required'],
            'satuan' => ['required'],
            'qty' => ['required','numeric'],
            'harga' => ['required','numeric']
        ]);

        Sparepart::where('id',$id)->update([
            'nama' => $request->nama,
            'merek' => $request->merek,
            'type' => $request->type,
            'satuan' => $request->satuan,
            'qty' => $request->qty,
            'harga' => $request->harga
        ]);

        return redirect()->route('admin.sparepart.index')->with('success','Sparepart berhasil diupdate');
    }

    public function destroy($id){

        $sparepart = Sparepart::findOrFail($id);
        $sparepart->delete();

        return redirect()->route('admin.sparepart.index')->with('success','Sparepart berhasil didelete');
    }
}
