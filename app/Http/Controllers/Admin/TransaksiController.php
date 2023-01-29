<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('layouts.admin.transaksi.index');
    }

    public function datatable(){
        $collections = Transaksi::orderBy('tanggal','DESC')->get();
        return datatables()
                ->of($collections)
                ->addColumn('','')
                ->addColumn('total_harga', function($row){
                    return format_uang($row->total_harga);
                })
                ->addColumn('status_pembayaran', function($row){
                    return '<span class="badge badge-'.getSPembayaan($row->status_pembayaran).' pt-2 px-2">'.strtoupper($row->status_pembayaran).'</span>';
                })
                ->addColumn('status_pengerjaan', function($row){
                    return '<span class="badge badge-'.getSPengerjaan($row->status_pengerjaan).' pt-2 px-2">'.strtoupper($row->status_pengerjaan).'</span>';
                })
                ->addColumn('aksi', function($row){
                    return '';
                })
                ->rawColumns(['','aksi','status_pembayaran','status_pengerjaan'])
                ->make(true);
    }

    public function create(){
        return view('layouts.admin.transaksi.create');
    }

    public function edit(){
        return view('layouts.admin.transaksi.edit');
    }
}
