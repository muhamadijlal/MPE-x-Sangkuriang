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
                <h5>Sparepart table</h5>
            </div>
            <div class="my-5">
                <a href="{{ route('admin.sparepart.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="ti-plus btn-icon-prepend"></i>
                    Tambah Sparepart
                </a>
            </div>
            <table class="table table-striped" id="myTable" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Merek</th>
                        <th>Type</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Harga</th>
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
function confirmDelete(id) {
    swal({
        title: "Anda yakin ingin menghapus ?",
        text: "Sparepart akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,  
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = ("/admin/sparepart/delete/"+id);
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
            url: "{{ route('admin.sparepart.datatable') }}",
            type: 'GET',
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // }
        },
        columns: [
            {data: '', name: ''},
            {data: 'nama', name: 'nama'},
            {data: 'merek', name: 'merek'},
            {data: 'type', name: 'type'},
            {data: 'qty', name: 'qty'},
            {data: 'satuan', name: 'satuan'},
            {data: 'harga', name: 'harga'},
            {data: 'aksi', name: 'aksi'},
        ]
    });
});
</script>
@endpush