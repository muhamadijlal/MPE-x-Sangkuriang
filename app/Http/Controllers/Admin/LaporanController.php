<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subtotal;
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
        $pengeluaran = DB::table('transaksi')
                        ->whereDate('transaksi.updated_at',Carbon::now())
                        ->join('subtotal','transaksi.id','=','subtotal.transaksi_id');

        $sparepart = $pengeluaran->sum('total_harga_sparepart');
        $jasa = $pengeluaran->sum('total_harga_jasa');
        $consumable = $pengeluaran->sum('total_harga_consumable');

        $totalPengeluaran = $sparepart+$jasa+$consumable;


        $query = DB::table('transaksi')
                        ->where('status_pembayaran','lunas')
                        ->whereDate('transaksi.tanggal',Carbon::now())
                        ->join('subtotal','transaksi.id','=','subtotal.transaksi_id');
        
        $pemasukan = $query->sum('total_harga');

                        
        // dd($query);
        return view('layouts.admin.laporan.hari',compact('tm','transaksiAll','totalPengeluaran','pemasukan'));
    }

    public function bulan(){
        $tm = DB::table('transaksi')
                ->whereYear('updated_at', date('Y'))
                ->whereMonth('updated_at', date('m'))
                ->count();
        
        $pengeluaran = DB::table('transaksi')
                    ->whereYear('transaksi.updated_at',date('Y'))
                    ->whereMonth('transaksi.updated_at',date('m'))
                    ->join('subtotal','transaksi.id','=','subtotal.transaksi_id');
        
        $sparepart = $pengeluaran->sum('total_harga_sparepart');
        $jasa = $pengeluaran->sum('total_harga_jasa');
        $consumable = $pengeluaran->sum('total_harga_consumable');

        $totalPengeluaran = $sparepart + $jasa + $consumable;

        $pemasukan = DB::table('transaksi')
                        ->where('status_pembayaran','=','lunas')
                        ->whereYear('transaksi.updated_at', date('Y'))
                        ->whereMonth('transaksi.updated_at', date('m'))
                        ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                        ->sum('subtotal.total_harga');
        // dd($pemasukan);

      
        return view('layouts.admin.laporan.bulan',compact('tm','totalPengeluaran','pemasukan'));
    }

    public function datatable(){
        $dataTransaksi = DB::table('transaksi')
        ->whereYear('transaksi.updated_at', date('Y'))
        ->whereMonth('transaksi.updated_at',date('m'))
        ->whereNotIn('status_pengerjaan',['selesai']) //wherenotin must be use under array type for the binding
        ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
        ->get();
        
        return datatables()->of($dataTransaksi)
                            ->addColumn('','')
                            ->addColumn('total_harga', function($dataTransaksi){
                                return format_uang($dataTransaksi->total_harga);
                            })
                            ->rawColumns(['','total_harga'])
                            ->make(true);
    }   

    public function laporan(){
        return view('layouts.admin.laporan.all');
    }

    public function laporanAll(){
        $dataTransaksi = DB::table('transaksi')
                        ->select('transaksi.*','subtotal.total_harga')
                        ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                        ->get();

        return datatables()->of($dataTransaksi)
                            ->addColumn('','')
                            ->addColumn('total_harga', function($dataTransaksi){
                                return format_uang($dataTransaksi->total_harga);
                            })
                            ->rawColumns(['','total_harga'])
                            ->make(true);
    }

    public function detail($id){
       $data =  Subtotal::find($id);
        // dd($data);
       return view('layouts.admin.laporan.detail', compact('data'));
    }
}
