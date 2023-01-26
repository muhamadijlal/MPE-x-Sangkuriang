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

    public function create(){
        return view('layouts.admin.spareparts.create');
    }

    public function edit(){
        return view('layouts.admin.spareparts.edit');
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
}
