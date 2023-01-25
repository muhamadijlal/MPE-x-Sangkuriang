@extends('master')

@section('content')
<div class="col-lg-12">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form edit karyawan</h4>
            <form class="forms-sample mt-5" action="#" method="#">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Karyawan</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Input Nama Karyawan">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Karyawan</label>
                  <textarea name="alamat" class="form-control" id="alamat" rows="4" placeholder="Input Alamay Karyawan Sesuai KTP"></textarea>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="phone">Nomor Handphone</label>
                      <input name="phone" type="text" class="form-control" id="phone" placeholder="Input Nomor Handphone Karyawan">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Role</label>
                      <select for="role" class="form-control" name="role">
                        <option value="#">Helper</option>
                        <option value="#">Teknisi</option>
                      </select>
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