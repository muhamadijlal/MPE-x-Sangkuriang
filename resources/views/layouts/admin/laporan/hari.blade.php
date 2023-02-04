@extends('master')
@section('content')
    <div class="container">
        <div class="card p-3">
            <h4 class="card-title mb-3">Laporan Hari Ini</h4>
            <p class="mb-3">Transaksi Masuk : {{ $tm }}</p>
            <hr>
            <table class="table table-responsive table-hover">
                <tbody>
                  @foreach ($transaksiAll as $item)
                  <tr>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->penanggung_jawab }}</td>
                  <td>{{ $item->perihal }}</td>
                  <td>{{ $item->status_pembayaran }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
              
        </div>
    </div>
@endsection