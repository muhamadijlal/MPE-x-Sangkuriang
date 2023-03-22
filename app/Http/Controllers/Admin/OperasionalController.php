<?php

namespace App\Http\Controllers\Admin;

use App\Models\Operasional;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperasionalController extends Controller
{
    public function index()
    {
        return view('layouts.admin.operasional.index');
    }

    public function datatable()
    {
        $collection = Transaksi::get();
        return datatables()
            ->of($collection)
            ->addColumn('nama', function($row){
                return $row->nama;
            })
            ->addColumn('detail', function($row){
                return "
                <a href='/admin/operasional/detail/".$row->id."'>Lihat detail</a>  
                ";
            })
            ->addColumn('','')
            ->rawColumns(['detail'])
            ->make(true);
    }

    public function create($id)
    {
        $transaksi = Transaksi::find($id);
        return view('layouts.admin.operasional.create', compact('transaksi'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'perihal.*' => ['required'],
            'nominal.*' => ['required','numeric']
        ]);

        for($i = 0; $i < count($request->perihal); $i++){
            Operasional::create([
                'transaksi_id' => $id,
                'perihal' => $request->perihal[$i],
                'nominal' => $request->nominal[$i],
            ]);
        }

        return redirect()->route('admin.operasional.index')->with('success','Transaksi berhasil dibuat!');
    }

    public function detail($id)
    {
        $perusahaan = Transaksi::findOrFail($id);
        $operasional = Operasional::where('transaksi_id',$id)->get();
        return view('layouts.admin.operasional.detail', compact('operasional','perusahaan'));
    }
    public function edit($id)
    {
        # code...
    }

    public function update(Request $request, $id)
    {
        # code...
    }

    public function destroy($id)
    {
        # code...
    }

}
