@extends('master')

@section('content')
<div class="col-lg-12">
  <div class="card p-4">
    <div class="card-body">
      <h4 class="card-title">Form edit jasa</h4>
      <form class="forms-sample mt-5" action="#" method="#">
        @csrf
        <div class="form-group">
          <label for="nama">Nama Jasa</label>
          <input name="nama" type="text" class="form-control" id="nama" placeholder="Input Nama Jasa">
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan Jasa</label>
          <input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Input Keterangan Jasa">
        </div>
        <div class="form-group">
          <label for="harga">Harga Jasa</label>
          <input name="harga" type="number" class="form-control" id="harga" placeholder="Input Harga Jasa">
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