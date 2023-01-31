<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consumable;
use App\Models\Jasa;
use App\Models\Karyawan;
use App\Models\Sparepart;
use App\Models\T_jasa;
use App\Models\T_Karyawan;
use App\Models\T_sparepart;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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
        $spareparts = Sparepart::all();
        $karyawan = Karyawan::all();
        $jasa = Jasa::all();

        return view('layouts.admin.transaksi.create', compact('spareparts','jasa','karyawan'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => ['required'],
            'penanggung_jawab' => ['required'],
            'lokasi' => ['required'],
            'perihal' => ['required'],
            'status_pembayaran' => ['in:belum bayar, dp, lunas'],
            'status_pengerjaan' => ['in:pending, proses, selesai'],
            'tanggal' => ['required'],
            'karyawan.*' => ['required'],
            'sparepart.*' => ['required'],
            'qtySparepart.*' => ['required','numeric'],
            'consumable.*' => ['required'],
            'qtyConsumable.*' => ['required','numeric'],
            'satuanConsumable.*' => ['required','string'],
            'hargaConsumable.*' => ['required','numeric'],
            'jasa.*' => ['required'],
            'qtyJasa.*' => ['required','numeric'],
        ]);

        $total_harga = 0;

        $id = Transaksi::create([
            'nama' => $request->nama,
            'penanggung_jawab' => $request->penanggung_jawab,
            'lokasi' => $request->lokasi,
            'total_harga' => $total_harga,
            'status_pengerjaan' => 'pending',
            'status_pembayaran' => 'belum bayar',
            'perihal' => $request->perihal,
            'tanggal' => $request->tanggal,
        ])->id;

        for ($i = 0; $i < count($request->karyawan); $i++) {
            T_Karyawan::create([
                'transaksi_id' => $id,
                'karyawan_id' => $request->karyawan[$i],
            ]);
        }

        for ($i = 0; $i < count($request->sparepart); $i++) {
            T_sparepart::create([
                'transaksi_id' => $id,
                'sparepart_id' => $request->sparepart[$i],
                'qty' => $request->qtySparepart[$i],
            ]);
        }

        for ($i = 0; $i < count($request->consumable); $i++) {
            Consumable::create([
                'transaksi_id' => $id,
                'nama' => $request->consumable[$i],
                'qty' => $request->qtyConsumable[$i],
                'satuan' => $request->satuanConsumable[$i],
                'harga' => $request->hargaConsumable[$i],
            ]);
        }

        for ($i = 0; $i < count($request->jasa); $i++) {
            T_jasa::create([
                'transaksi_id' => $id,
                'jasa_id' => $request->jasa[$i],
                'qty' => $request->qtyJasa[$i]
            ]);
        }

        return redirect()->route('admin.transaksi.index')->with('success','Transaksi berhasil dibuat!');
    }

    public function edit(){
        return view('layouts.admin.transaksi.edit');
    }
}
