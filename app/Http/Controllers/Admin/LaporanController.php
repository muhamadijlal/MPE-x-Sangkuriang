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
                ->whereDate('tanggal', Carbon::today())
                ->count();
        // dd($tm);
        return view('layouts.admin.laporan.hari');
    }
}
