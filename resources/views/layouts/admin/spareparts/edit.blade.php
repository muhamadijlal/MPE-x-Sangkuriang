@extends('master')

@section('content')
<div class="col-lg-12">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form tambah sparepart</h4>
            <form class="forms-sample mt-5" action="{{ route('admin.sparepart.update', $sparepart->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Sparepart</label>
                  <input name="nama" type="text" class="form-control @error('nama')
                    is-invalid
                  @enderror" id="nama" placeholder="Input Nama Sparepart" autocomplete="off" value="{{ $sparepart->nama }}">
                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="merek">Merek Sparepart</label>
                  <input name="merek" type="text" class="form-control @error('merek')
                    is-invalid
                  @enderror" id="merek" placeholder="Input Merek Sparepart" autocomplete="off" value="{{ $sparepart->merek }}">
                  @error('merek')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="type">Type Sparepart</label>
                      <input name="type" type="text" class="form-control @error('type')
                        is-invalid
                      @enderror" id="type" placeholder="Input Jenis Sparepart" autocomplete="off" value="{{ $sparepart->type }}">
                      @error('type')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="satuan">Satuan Sparepart</label>
                      <input name="satuan" type="text" class="form-control @error('satuan')
                        is-invalid
                      @enderror" id="satuan" placeholder="Contoh: Lot/Pcs/Unit" autocomplete="off" value="{{ $sparepart->satuan }}">
                      @error('satuan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="qty">Qty</label>
                      <input name="qty" type="number" class="form-control @error('qty')
                        is-invalid
                      @enderror" id="qty" placeholder="Input Jumlah Sparepart" autocomplete="off" value="{{ $sparepart->qty }}">
                      @error('qty')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="harga">Harga Satuan</label>
                      <input name="harga" type="number" class="form-control @error('harga')
                        is-invalid
                      @enderror" id="harga" placeholder="Input Harga Sparepart" autocomplete="off" value="{{ $sparepart->harga }}">
                      @error('harga')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
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