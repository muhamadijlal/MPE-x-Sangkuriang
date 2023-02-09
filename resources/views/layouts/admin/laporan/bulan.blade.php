@extends('master')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dataTable/css/dataTables.bootstrap5.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dataTable/css/responsive.dataTables.min.css') }}"/>
@endpush

@section('content')
<div class="col-lg-12">
    <div class="card p-4 mb-5">
        <div class="card-body">
            <div class="d-flex justify-content-between gap-4">
                <h5 class="mb-3">Transaksi Masuk : {{ $tm }}</h5>
                <h5 class="mb-3"> Perkiraan Pengeluaran : @currency($totalPengeluaran)</h5>
                <h5 class="mb-3"> Perkiraan Uang Didapat : @currency($pemasukan)</h5>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card p-4">
        <div class="card-body">
            <div class="card-title">
                <h5>Tabel Laporan Bulanan</h5>
            </div>
            <table class="table table-striped"  id="myTable" width="100%">
                <thead>
                    <tr>
                        <th></th>
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
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('assets/dataTable/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dataTable/js/jquery-3.5.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dataTable/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dataTable/js/dataTables.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dataTable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset("assets/sweetAlert/sweetalert.min.js") }}"></script>
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
            {data: ''},
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