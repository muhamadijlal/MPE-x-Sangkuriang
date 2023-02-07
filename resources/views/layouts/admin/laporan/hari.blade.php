@extends('master')
@section('content')

<div class="col-lg-12">
  <div class="card p-4">
      <div class="card-body">
          <div class="card-title">
              <h5>Tabel Laporan Bulanan</h5>
          </div>
        <table class="table table-striped"  id="myTable" width="100%">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Penanggung Jawab</th>
                <th>Perihal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($transaksiAll as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->penanggung_jawab }}</td>
                <td>{{ $item->perihal }}</td>
                <td><a href="/laporan/{{ $item->id }}" class="btn btn-primary">Detail</a></td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center">Data belum ada</td>
              </tr>
              @endforelse
            </tbody>
        </table>
      </div>
  </div>
</div>
@endsection