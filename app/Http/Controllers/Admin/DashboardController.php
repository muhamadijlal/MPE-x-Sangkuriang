<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
       $jan = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(1))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');

        $feb = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(2))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');


        $mar = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(3))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');


        $apr = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(4))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');
        
        $may = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(5))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');


        $jun = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(6))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');
            

        $jul = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(7))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');
                

        $aug = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(8))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');

        $sept = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(9))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');   


        $oct = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(10))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');
            

        $nov = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(11))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');


        $dec = DB::table('transaksi')
                ->where('status_pembayaran','=','lunas')
                ->where('status_pengerjaan','=','selesai')
                ->whereYear('tanggal','=',date('Y'))
                ->whereMonth('tanggal','=',date(12))
                ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                ->sum('subtotal.total_harga');

        $penerimaan = DB::table('transaksi')
                        ->where('status_pembayaran','=','lunas')
                        ->whereYear('tanggal','=',date('Y'))
                        ->whereMonth('tanggal','=',date('m'))
                        ->join('subtotal','transaksi.id','=','subtotal.transaksi_id')
                        ->sum('subtotal.total_harga');
        
        $po = DB::table('transaksi')
                    ->where('status_pengerjaan','=','pending')
                    ->whereYear('tanggal','=',date('Y'))
                    ->whereMonth('tanggal',date('m'))
                    ->count();
        $totalTransaksi = DB::table('transaksi')
                        ->whereYear('tanggal',date('Y'))
                        ->whereMonth('tanggal',date('m'))
                        ->count();
        $query = DB::table('sparepart')
                        ->select(DB::raw('sum(harga * qty) as total'))
                        ->whereYear('updated_at',date('Y'))
                        ->whereMonth('updated_at',date('m'))
                        ->get();
        $sparepart = [];
        foreach ($query as $item) {
                $sparepart[] = $item->total;
        }

        // dd($sparepart);
        return view('layouts.admin.dashboard', compact('jan','feb','mar','apr','may','jun','jul','aug','sept','oct','nov', 'dec','penerimaan','po','totalTransaksi','sparepart'));
    }
}
