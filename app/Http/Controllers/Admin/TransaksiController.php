<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consumable;
use App\Models\Jasa;
use App\Models\Karyawan;
use App\Models\Kwitansi;
use App\Models\Sparepart;
use App\Models\Subtotal;
use App\Models\T_jasa;
use App\Models\T_Karyawan;
use App\Models\T_sparepart;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                    return format_uang(isExist($row->subtotal));
                    // return $row->subtotal;
                })
                ->addColumn('tanggal', function($row){
                    return date('d-M-Y', strtotime($row->tanggal));
                })
                ->addColumn('status_pembayaran', function($row){
                    return '<span class="badge badge-'.getSPembayaran($row->status_pembayaran).' pt-2 px-2">'.strtoupper($row->status_pembayaran).'</span>';
                })
                ->addColumn('status_pengerjaan', function($row){
                    return '<span class="badge badge-'.getSPengerjaan($row->status_pengerjaan).' pt-2 px-2">'.strtoupper($row->status_pengerjaan).'</span>';
                })
                ->addColumn('aksi', function($row){
                    return '<a href="transaksi/approvement/'.$row->id.'" type="button" class="btn btn-outline-info btn-fw py-2">
                                Detail
                            </a>';
                })
                ->rawColumns(['','aksi','tanggal','status_pembayaran','status_pengerjaan','total_harga'])
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

        $jasa = $request["jasa"];
        $karyawan = $request["karyawan"];
        $spareparts = $request["sparepart"];
        $qtySparepart = $request["qtySparepart"];
        $hasDuplicates = count($spareparts) > count(array_unique($spareparts));
        $karyawanDuplicate = count($karyawan) > count(array_unique($karyawan));
        $jasaDuplicate = count($jasa) > count(array_unique($jasa));
        
        if($karyawanDuplicate){
            return redirect()->route('admin.transaksi.create')->withErrors('karyawan tidak boleh diuplikat!');
        }

        if($jasaDuplicate){
            return redirect()->route('admin.transaksi.create')->withErrors('Jasa tidak boleh diuplikat!');
        }

        foreach($request["sparepart"] as $sparepart){
            $qty[] = DB::table('sparepart')->select('id','qty')->where('id', $sparepart)->first();
        }

        if($hasDuplicates){
            return redirect()->route('admin.transaksi.create')->withErrors('Sparepart tidak boleh diuplikat!');
        }else{
            for($i = 0; $i < count($qtySparepart); $i++){
                if($qty[$i]->qty < intVal($qtySparepart[$i])){
                    return redirect()->route('admin.transaksi.create')->withErrors('stok sparepart kurang!');
                }
            }
        }

        $id = Transaksi::latest()->get();

        $id = Transaksi::create([
            'nama' => $request->nama,
            'penanggung_jawab' => $request->penanggung_jawab,
            'lokasi' => $request->lokasi,
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

        $total_harga_sparepart = DB::table('transaksi')
                        ->join('t_sparepart','transaksi.id','=','t_sparepart.transaksi_id')
                        ->join('sparepart','t_sparepart.sparepart_id','=','sparepart.id')
                        ->select(
                            DB::raw('sum(t_sparepart.qty*sparepart.harga) as total_harga_sparepart')
                        )
                        ->where('transaksi.id', $id)
                        ->get();

        $total_harga_jasa = DB::table('transaksi')
                        ->join('t_jasa','transaksi.id','=','t_jasa.transaksi_id')
                        ->join('jasa','t_jasa.jasa_id','=','jasa.id')
                        ->select(
                            DB::raw('sum(t_jasa.qty*jasa.harga) as total_harga_jasa')
                        )
                        ->where('transaksi.id', $id)
                        ->get();

        $total_harga_consume = DB::table('transaksi')
                        ->join('consumable','transaksi.id','=','consumable.transaksi_id')
                        ->select(
                            DB::raw('sum(consumable.qty*consumable.harga) as total_harga_consume')
                        )
                        ->where('transaksi.id', $id)
                        ->get();

        $total_harga_transaksi = $total_harga_consume[0]->total_harga_consume+$total_harga_jasa[0]->total_harga_jasa+$total_harga_sparepart[0]->total_harga_sparepart;

        Subtotal::create([
            'transaksi_id' => $id,
            'total_harga_sparepart' => $total_harga_sparepart[0]->total_harga_sparepart,
            'total_harga_jasa' => $total_harga_jasa[0]->total_harga_jasa,
            'total_harga_consumable' => $total_harga_consume[0]->total_harga_consume,
            'total_harga' => $total_harga_transaksi
        ]);

        for($i = 0; $i < count($qty); $i++){
            Sparepart::where('id', $qty[$i]->id)->update([
                'qty' => intval($qty[$i]->qty) - intval($qtySparepart[$i])
            ]);
        }

        return redirect()->route('admin.transaksi.index')->with('success','Transaksi berhasil dibuat!');
    }

    public function approvement($id){
        $transaksi = Transaksi::find($id);
        return view('layouts.admin.approvement.index', compact('transaksi'));
    }

    public function approvementStore(Request $request, $id){
        $request->validate([
            'status_pembayaran' => ['required'],
            'status_pengerjaan' => ['required'],
            'potongan_harga' => ['numeric'],
            'filename' => ['max:1000','mimes:jpg,png,jpeg']
        ]);

        Transaksi::where('id',$id)->update([
            'status_pembayaran' => $request->status_pembayaran,
            'status_pengerjaan' => $request->status_pengerjaan,
        ]);

        if($request->has('potongan_harga')){
            DB::table('subtotal')->where('id', $id)->update([
                'potongan_harga' => $request->potongan_harga,
            ]);
        }

        if($request->has('file')){
            $file = $request->file('file');
            $filename = date('YmdHis').str_replace(" ","_", $file->getClientOriginalName());
            $request->file->move('bukti_pembayaran',$filename);

            Kwitansi::create([
                'transaksi_id' => $id,
                'filename' => $filename
            ]);
        };

        return redirect()->route('admin.transaksi.index')->with('success','status transkasi berhasil diupdate!');
    }

    public function invoice($id){
        $transaksi = Transaksi::find($id);

        return view("layouts.admin.transaksi.invoice", compact('transaksi'));
    }
}
