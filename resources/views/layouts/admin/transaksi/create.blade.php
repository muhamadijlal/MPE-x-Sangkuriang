@extends('master')

@section('content')
<div class="col-lg-12">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form tambah transaksi</h4>
            <form class="forms-sample mt-5" action="#" method="#">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Perusahaan</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Input Nama Perusahaan">
                </div>
                <div class="form-group">
                    <label for="penganggung">Penanggung Jawab Perusahaan</label>
                    <input name="penganggung" type="text" class="form-control" id="penganggung" placeholder="Input Nama Penganggung Jawab pihak penyewa jasa">
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi Perusahaan</label>
                    <input name="lokasi" type="text" class="form-control" id="lokasi" placeholder="Input Lokasi Perusahaan">
                </div>
                <div class="form-group">
                    <label for="perihal">Perihal</label>
                    <input name="perihal" type="text" class="form-control" id="perihal" placeholder="Input Perihal">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Penawaran</label>
                    <input name="tanggal" type="date" class="form-control" id="tanggal" placeholder="Input Tanggal Penawaran">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="sparepart">Sparepart</label>
                                    <select class="form-control" id="sparepart">
                                        <option  value="">-- Pilih --</option>
                                        <option  value="">Sparepart 1</option>
                                        <option  value="">Sparepart 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="Qty">Qty</label>
                                    <input name="sparepart" type="number" class="form-control" id="sparepart" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-1 mt-1">
                                <button type="button" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="jasa">Jasa</label>
                                    <select class="form-control" id="jasa">
                                        <option  value="">-- Pilih --</option>
                                        <option  value="">jasa 1</option>
                                        <option  value="">jasa 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="Qty">Qty</label>
                                    <input name="sparepart" type="number" class="form-control" id="sparepart" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-1 mt-1">
                                <button type="button" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total">Total Harga</label>
                    <input name="total" type="text" class="form-control" value="Rp.120.000" id="total" readonly>
                </div>
                <div class="my-5">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection