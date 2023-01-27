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
        return redirect('/admin/jasa');
        
    }

    public function edit(){
        return view('layouts.admin.jasa.edit');
    }
}
