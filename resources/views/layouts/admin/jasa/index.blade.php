@extends('master')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dataTable/css/dataTables.bootstrap5.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dataTable/css/responsive.dataTables.min.css') }}"/>
@endpush

@section('content')
<div class="col-lg-12">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
    </div>
    @endif
    <div class="card p-4">
        <div class="card-body">
            <div class="card-title">
                <h5>Jasa table</h5>
            </div>
            <div class="my-5">
                <a href="{{ route('admin.jasa.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="ti-plus btn-icon-prepend"></i>
                    Tambah Jasa
                </a>
            </div>
            <table class="table table-striped"  id="myTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Jasa</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
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
    function confirmDelete(data_id) {
    swal({
        title: "Anda yakin ingin menghapus ?",
        text: "Jasa akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,  
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = ("/admin/jasa/delete/"+ data_id);
        } else {
            swal("Proses hapus dibatalkan!");
        }
    });
}
</script>
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
            url: "{{ route('admin.jasa.datatable') }}",
            type: 'GET',
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // }
        },
        columns: [
            {data: ''},
            {data: 'nama', name: 'nama'},
            {data: 'deskripsi', name: 'deskripsi'},
            {data: 'harga', name: 'harga'},
            {data: 'created_at', name: 'created_at'},
            {data: 'aksi', name: 'aksi'},
        ]
    });
});
</script>
@endpush