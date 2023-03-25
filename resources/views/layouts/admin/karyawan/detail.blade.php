@extends('master')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
</div>
@endif
<div class="row">
  <div class="col-lg-12">
    <div class="card p-4">
      <div class="card-body">
        <h4 class="card-title">Detail gaji karayawan</h4>
          <table class="table table-striped" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Karyawan</th>
                <th>Upah %</th>
                <th>Nominal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($karyawan as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->karyawan->nama }}</td>
                <td>{{ $item->karyawan->role->upah }} %</td>
                <td>{{ format_uang(($transaksi->subtotal->total_harga * $item->karyawan->role->upah) / 100) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <h4 class="card-footer">Harga transaksi : {{ format_uang($transaksi->subtotal->total_harga) }}</h4>
      </div>
    </div>
  </div>
</div>
@endsection