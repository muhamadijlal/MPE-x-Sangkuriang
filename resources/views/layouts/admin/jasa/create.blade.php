@extends('master')

@section('content')
<div class="col-lg-12">
  <div class="card p-4">
    <div class="card-body">
      <h4 class="card-title">Form tambah jasa</h4>
      <form action="{{ route('admin.jasa.store') }}" class="forms-sample mt-5" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama">Nama Jasa</label>
          <input name="nama" type="text" class="form-control form-control-sm @error('nama')
            is-invalid
          @enderror" id="nama" placeholder="Input Nama Jasa">
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan Jasa</label>
          <input name="keterangan" type="text" class="form-control form-control-sm @error('keterangan')
            is-invalid
          @enderror" id="keterangan" placeholder="Input Keterangan Jasa">
          @error('keterangan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="satuan">Satuan Jasa</label>
          <input name="satuan" type="text" class="form-control form-control-sm @error('satuan')
            is-invalid
          @enderror" id="satuan" placeholder="Input satuan Jasa">
          @error('satuan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="harga">Harga Jasa</label>
          <input name="harga" type="number" class="form-control form-control-sm @error('harga')
            is-invalid
          @enderror" id="harga" placeholder="Input Harga Jasa">
          @error('harga')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="my-5 float-end">
          <button type="reset" class="btn btn-light">Cancel</button>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection