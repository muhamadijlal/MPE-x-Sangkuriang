@extends('master')
@section('content')
    <div class="container">
        <div class="card p-3">
          <h4 class="card-title mb-3">Laporan Hari Ini</h4>
          <div class="d-flex justify-content-between gap-4">
            <p class="mb-3">Transaksi Masuk : {{ $tm }}</p>
            <p class="mb-3"> Perkiraan Pengeluaran : @currency($totalPengeluaran)</p>
            <p class="mb-3"> Perkiraan Uang Didapat : @currency($pemasukan)</p>
          </div>
            <hr>
            <table class="table table-responsive table-hover">
              <h4 class="text-center">Data Pengerjaan Belum Selesai Hari Ini</h4>
              <hr class="mb-4">
                <tbody>
                  @foreach ($transaksiAll as $item)
                  <tr>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->penanggung_jawab }}</td>
                  <td>{{ $item->perihal }}</td>
                  <td><a href="/laporan/{{ $item->id }}" class="btn btn-primary">Detail</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
              
        </div>
    </div>
@endsection