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
        <h4 class="card-title">Operasional {{ $perusahaan->nama }}</h4>
          <table class="table table-striped" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Perihal</th>
                <th>Nominal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($operasional as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->perihal }}</td>
                <td>{{ format_uang($item->nominal) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
@endsection