<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index(){
        return view('layouts.admin.jasa.index');
    }

    public function create(){
        return view('layouts.admin.jasa.create');
    }

    public function edit(){
        return view('layouts.admin.jasa.edit');
    }
}
