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
              <h4 class="text-center">Data Pengerjaan Belum Selesai Bulan Ini</h4>
              <hr class="mb-4">
              <table class="table table-striped"  id="myTable" width="100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Penanggung Jawab</th>
                        <th>Lokasi Perusahaan</th>
                        <th>Total Harga</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                        <th>Status Pengerjaan</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody></tbody>
              </table>
              <hr>
              
        </div>
    </div>
@endsection
@push('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/datatables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable({
        processing: true,
        serverside: true,
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
            className: 'dtr-control',
            orderable: false,
            targets: 0
        }],
        ajax: {
            url: "{{ route('admin.laporan.datatable') }}",
            type: 'GET',
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // }
        },
        columns: [
            {data: 'nama', name: 'nama'},
            {data: 'penanggung_jawab', name: 'penanggung_jawab'},
            {data: 'lokasi', name: 'lokasi'},
            {data: 'total_harga', name: 'total_harga'},
            {data: 'perihal', name: 'perihal'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'status_pengerjaan', name: 'status_pengerjaan'},
            {data: 'status_pembayaran', name: 'status_pembayaran'},
        ]
    });
});
</script>
@endpush