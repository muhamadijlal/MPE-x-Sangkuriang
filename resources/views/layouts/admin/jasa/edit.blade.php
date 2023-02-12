@extends('master')

@section('content')
<div class="col-lg-12">
  <div class="card p-4">
    <div class="card-body">
      <h4 class="card-title">Form edit jasa</h4>
      @foreach ($data as $item)
      <form class="forms-sample mt-5" action="{{ route('admin.jasa.update', $item->id ) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="nama">Nama Jasa</label>
          <input name="nama" type="text" class="form-control form-control-sm @error('nama')
            is-invalid
          @enderror" id="nama" placeholder="Input Nama Jasa" value="{{ $item->nama }}">
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
          @enderror" id="keterangan" placeholder="Input Keterangan Jasa" value="{{ $item->deskripsi }}">
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
          @enderror" id="satuan" placeholder="Input satuan Jasa" value="{{ $item->satuan }}">
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
          @enderror" id="harga" placeholder="Input Harga Jasa" value="{{ $item->harga }}">
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
        @endforeach
      </form>
    </div>
  </div>
</div>
@endsection