<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function hari(){
        $tm = DB::table('transaksi')
                ->whereDate('created_at', Carbon::today())
                ->count();
        
        $transaksiAll = DB::table('transaksi')
                        ->where('status_pengerjaan','pending')
                        ->whereDate('created_at', Carbon::now())
                        ->get();

        $query = DB::table('transaksi')
                        ->where('status_pembayaran','lunas')
                        ->whereDate('updated_at',Carbon::now());
        $pemasukan = $query->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                            ->sum('subtotal.total_harga');
                        
        $pengeluaranSpr = $query->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                                ->sum('subtotal.total_harga_sparepart');
        
        $pengeluaranJasa = $query->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                                    ->sum('subtotal.total_harga_jasa');
                        
        // dd($tm);
        return view('layouts.admin.laporan.hari',compact('tm','transaksiAll'));
    }
}
