<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('layouts.admin.transaksi.index');
    }

    public function create(){
        return view('layouts.admin.transaksi.create');
    }

    public function edit(){
        return view('layouts.admin.transaksi.edit');
    }
}
