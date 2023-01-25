@extends('master')

@section('content')
<div class="col-lg-12">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form edit sparepart</h4>
            <form class="forms-sample mt-5" action="#" method="#">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Sparepart</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Input Nama Sparepart">
                </div>
                <div class="form-group">
                    <label for="merek">Merek Sparepart</label>
                    <input name="merek" type="text" class="form-control" id="merek" placeholder="Input Merek Sparepart">
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="type">Type Sparepart</label>
                      <input name="type" type="text" class="form-control" id="type" placeholder="Input Jenis Sparepart">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="satuan">Satuan Sparepart</label>
                      <input name="satuan" type="text" class="form-control" id="satuan" placeholder="Contoh: Lot/Pcs/Unit">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="qty">Qty</label>
                      <input name="qty" type="number" class="form-control" id="qty" placeholder="Input Jumlah Sparepart">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input name="harga" type="number" class="form-control" id="harga" placeholder="Input Harga Sparepart">
                    </div>
                  </div>
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