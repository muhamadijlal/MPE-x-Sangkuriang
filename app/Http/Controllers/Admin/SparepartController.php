<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
