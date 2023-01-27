@extends('master')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
  <div class="col-lg-7">
    <div class="card p-4">
      <div class="card-body">
        <h4 class="card-title">Daftar Role Karyawan</h4>
          <table class="table table-striped" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Role Karyawan</th>
                <th>Upah (%)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->jenis }}</td>
                <td>{{ $role->upah }} %</td>
                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">{{ $role->keterangan }}</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm" onClick="confirmDelete({{ $role->id }})"><i class="ti-trash"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form tambah role karayawan</h4>
            <form class="forms-sample mt-5" action="{{ route('admin.role.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis">Jenis Role</label>
                    <input name="jenis" type="text" class="form-control @error('jenis')
                      is-invalid
                    @enderror" id="jenis" placeholder="Input Jenis Role" autocomplete="off">
                    @error('jenis')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="upah">Upah (%)</label>
                    <input name="upah" type="number" class="form-control @error('upah')
                      is-invalid
                    @enderror" id="upah" placeholder="Input Upah Karyawan (%)" autocomplete="off">
                    @error('upah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input name="keterangan" type="text" class="form-control @error('keterangan')
                      is-invalid
                    @enderror" id="keterangan" placeholder="Input Jenis Sparepart" autocomplete="off">
                    @error('keterangan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="my-5">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function confirmDelete(data_id) {
  swal({
    title: "Anda yakin ingin menghapus ?",
    text: "Role "+ data_id +" akan dihapus secara permanen!",
    icon: "warning",
    buttons: true,  
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location.href = ("/admin/role/destroy/"+data_id);
    } else {
      swal("Proses hapus dibatalkan!");
    }
  });
}
</script>
@endpush