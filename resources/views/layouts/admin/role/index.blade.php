@extends('master')

@section('content')
<div class="row">
  <div class="col-lg-7">
    <div class="card p-4">
      <div class="card-body">
        <h4 class="card-title">Daftar Role Karyawan</h4>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Role Karyawan</th>
                <th>Upah (%)</th>
                <th>Keterangan</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Helper</td>
                <td>10 %</td>
                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit mollitia beatae perferendis!</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="ti-trash"></i>
                    </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Teknisi</td>
                <td>20 %</td>
                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit mollitia beatae perferendis!</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="ti-trash"></i>
                    </button>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form tambah role karayawan</h4>
            <form class="forms-sample mt-5" action="#" method="#">
                @csrf
                <div class="form-group">
                    <label for="jenis">Jenis Role</label>
                    <input name="jenis" type="text" class="form-control" id="jenis" placeholder="Input Jenis Role">
                </div>
                <div class="form-group">
                    <label for="upah">Upah (%)</label>
                    <input name="upah" type="number" class="form-control" id="upah" placeholder="Input Upah Karyawan (%)">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Input Jenis Sparepart">
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