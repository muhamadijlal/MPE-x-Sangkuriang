@extends('master')

@section('content')
<div class="col-lg-12">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form tambah karyawan</h4>
            <form class="forms-sample mt-5" action="{{ route('admin.karyawan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Karyawan</label>
                    <input name="nama" type="text" class="form-control form-control-sm @error('nama')
                      is-invalid
                    @enderror" id="nama" placeholder="Input Nama Karyawan" autocomplete="off" value="{{ old("nama") }}">
                    @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Karyawan</label>
                  <textarea name="alamat" class="form-control form-control-sm @error('alamat')
                    is-invalid
                  @enderror" id="alamat" rows="4" placeholder="Input Alamat Karyawan Sesuai KTP">{{ old('alamat') }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="telepon">Nomor Telepon</label>
                      <input name="telepon" type="text" class="form-control form-control-sm @error('telepon')
                        is-invalid
                      @enderror" id="telepon" placeholder="Input Nomor Telepon Karyawan" autocomplete="off" value="{{ old("telepon") }}">
                      @error('telepon')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Role</label>
                      <select for="role" class="form-control form-control-sm @error('role')
                        is-invalid
                      @enderror" name="role">
                        <option value="">-- Pilih --</option>
                        @foreach ($roles as $role)
                          <option {{ old('role') == $role->jenis ? 'selected' : '' }} value="{{ $role->id }}">{{ ucwords($role->jenis) }}</option>
                        @endforeach
                      </select>
                      @error('role')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="my-5 float-end">
                  <button class="btn btn-light">Cancel</button>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection