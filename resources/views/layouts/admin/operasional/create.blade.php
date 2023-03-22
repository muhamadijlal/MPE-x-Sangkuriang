@extends('master')

@push('css')
@endpush

@section('content')
@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-lg-12">
    <div class="card p-4">
        <div class="card-body">
            <h4 class="card-title">Form input biaya operasional</h4>
            <form class="forms-sample mt-5" action="{{ route('admin.operasional.store', $transaksi->id) }}" method="POST">
              @csrf
              <div id="rowFieldOperasional">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                      <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input name="perihal[]" type="text" class="form-control form-control-sm" id="perihal" placeholder="Input perihal" autocomplete="off" min=0>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input name="nominal[]" type="number" class="form-control form-control-sm" id="nominal" placeholder="Rp." autocomplete="off" min=0>
                      </div>
                    </div>
                    <div class="col-lg-1 mt-1">
                      <button type="button" id="addFieldOperasional" class="btn btn-sm btn-outline-primary">
                        <i class="ti ti-plus"></i>
                      </button>
                    </div>
                </div>
              </div>
              <div class="my-5 float-end">
                <button type="reset" class="btn btn-light">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
  // add field
  $("#addFieldOperasional").click(function () {
      let html = '';      

      html += '<div class="row align-items-center" id="rowAddOperasional">';
      html += '<div class="col-lg-7">';
      html += '<div class="form-group">';
      html += '<label for="perihal">Perihal</label>';
      html += '<input name="perihal[]" type="text" class="form-control form-control-sm" id="perihal" placeholder="Input perihal" autocomplete="off" min=0>';
      html += '</div>';
      html += '</div>';
      // 
      html += '<div class="col-lg-3">';
      html += '<div class="form-group">';
      html += '<label for="nominal">Nominal</label>';
      html += '<input name="nominal[]" type="number" class="form-control form-control-sm" id="nominal" placeholder="Rp." autocomplete="off" min=0>';
      html += '</div>';
      html += '</div>';
      
      html += '<div class="col-lg-1 mt-1">';
      html += '<button type="button" id="deleteRowOperasional" class="btn btn-sm btn-outline-danger">';
      html += '<i class="ti ti-trash"></i>';
      html += '</button>';
      html += '</div>';
      html += '</div>';
      
      $('#rowFieldOperasional').append(html);
  });

  // remove row
  $(document).on('click', '#deleteRowOperasional', function () {
      $(this).closest('#rowAddOperasional').remove();
  });
</script>
@endpush