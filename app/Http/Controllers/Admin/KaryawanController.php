<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(){
        return view('layouts.admin.karyawan.index');
    }

    public function create(){
        return view('layouts.admin.karyawan.create');
    }

    public function edit(){
        return view('layouts.admin.karyawan.edit');
    }
}
