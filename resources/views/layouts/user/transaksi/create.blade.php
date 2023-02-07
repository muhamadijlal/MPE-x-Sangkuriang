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
            <h4 class="card-title">Form tambah transaksi</h4>
            <form class="forms-sample mt-5" action="{{ route('admin.transaksi.store') }}" method="POST">
                @csrf
                <small>Client/Customer</small>
                <div class="border rounded p-4 mb-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama Perusahaan</label>
                                <input name="nama" type="text" class="form-control form-control-sm" id="nama" placeholder="Input Nama Perusahaan" value="{{ old('nama') }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="penanggung_jawab">Penanggung Jawab Perusahaan</label>
                                <input name="penanggung_jawab" type="text" class="form-control form-control-sm" id="penanggung_jawab" placeholder="Input Nama Penanggung Jawab pihak penyewa jasa" value="{{ old('penanggung_jawab') }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lokasi">Lokasi Perusahaan</label>
                                <input name="lokasi" type="text" class="form-control form-control-sm" id="lokasi" placeholder="Input Lokasi Perusahaan" autocomplete="off" value="{{ old('lokasi') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Penawaran</label>
                                <input name="tanggal" type="date" class="form-control form-control-sm" id="tanggal" placeholder="Input Tanggal Penawaran" autocomplete="off" value="{{ old('tanggal') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <textarea class="form-control form-control-sm" name="perihal" id="perihal" placeholder="Input perihal"></textarea>
                    </div>
                </div>

                <small>Karyawan</small>
                <div class="border rounded p-4 mb-4">
                    <div id="inputFieldKaryawan">
                        <div class="row align-items-center">
                            <div class="col-lg-11">
                                <div class="form-group">
                                    <label for="karyawan">Karyawan</label>
                                    <select class="form-control form-control-sm" id="karyawan" name="karyawan[]">
                                        <option value="">--Pilih--</option>
                                        @foreach ($karyawan as $item)
                                            <option {{ old('karyawan') == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 mt-1">
                                <button type="button" id="addFieldKaryawan" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <small>Spareparts</small>
                <div class="border rounded p-4 mb-4">
                    <div id="inputFieldSparepart">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="sparepart">Sparepart</label>
                                    <select class="form-control form-control-sm" id="sparepart" name="sparepart[]">
                                        <option value="">--Pilih--</option>
                                        @foreach ($spareparts as $item)
                                            <option {{ old('sparepart') == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }} : {{ $item->merek }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="QtySparepart">Qty Sparepart</label>
                                    <input name="qtySparepart[]" type="number" class="form-control form-control-sm" id="qtySparepart" placeholder="0" autocomplete="off" min=0>
                                </div>
                            </div>
                            <div class="col-lg-1 mt-1">
                                <button type="button" id="addFieldSparepart" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <small>Consumable</small>
                <div class="border rounded p-4 mb-4">
                    <div id="inputFieldConsumable">
                        <div class="row align-items-center">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="consumable">Consumable</label>
                                    <input name="consumable[]" type="text" class="form-control form-control-sm" id="consumable" placeholder="Input consumable" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="satuanConsumable">Satuan Consumable</label>
                                    <input name="satuanConsumable[]" type="text" class="form-control form-control-sm" id="satuanConsumable" placeholder="Contoh: Lot/Can/Kg/Cm/dst" autocomplete="off" min=0>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="hargaConsumable">Harga Consumable</label>
                                    <input name="hargaConsumable[]" type="text" class="form-control form-control-sm"  placeholder="Input nominal tanpa titik" autocomplete="off" min=0>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="QtyConsumable">Qty Consumable</label>
                                    <input name="qtyConsumable[]" type="number" class="form-control form-control-sm" id="qtyConsumable" placeholder="0" autocomplete="off" min=0>
                                </div>
                            </div>
                            <div class="col-lg-1 mt-1">
                                <button type="button" id="addFieldConsumable" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <small>Jasa</small>
                <div class="border rounded p-4 mb-4">
                    <div id="inputFieldJasa">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="jasa">Jasa</label>
                                    <select class="form-control form-control-sm" id="jasa" name="jasa[]">
                                        <option  value="">-- Pilih --</option>
                                        @foreach ($jasa as $item)
                                            <option {{ old('jasa') == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="QtyJasa">Qty Jasa</label>
                                    <input name="qtyJasa[]" type="number" class="form-control form-control-sm" id="qtyJasa" placeholder="0" autocomplete="off" min=0>
                                </div>
                            </div>
                            <div class="col-lg-1 mt-1">
                                <button type="button" id="addFieldJasa" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
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
    $("#addFieldSparepart").click(function () {
        let html = '';      

        html += '<div class="row align-items-center" id="rowInputAddSparepart">';
        html += '<div class="col-lg-7">';
        html += '<div class="form-group">';
        html += '<label for="sparepart">Sparepart</label>';
        html += '<select class="form-control form-control-sm" id="sparepart" name="sparepart[]">';
        html += '<option value="">--Pilih--</option>';
        html += '@foreach ($spareparts as $item)';
        html += '<option {{ old("sparepart") == $item->id ? "selected" : ''}} value="{{ $item->id }}">{{ $item->nama }} : {{ $item->merek }}</option>';
        html += '@endforeach';  
        html += '</select>';
        html += '</div>';
        html += '</div>';
        // 
        html += '<div class="col-lg-3">';
        html += '<div class="form-group">';
        html += '<label for="QtySparepart">Qty Sparepart</label>';
        html += '<input name="qtySparepart[]" type="number" class="form-control form-control-sm" id="qtySparepart" placeholder="0" autocomplete="off" min=0>';
        html += '</div>';
        html += '</div>';
        
        html += '<div class="col-lg-1 mt-1">';
        html += '<button type="button" id="deleteRowInputSparepart" class="btn btn-sm btn-outline-danger">';
        html += '<i class="ti ti-trash"></i>';
        html += '</button>';
        html += '</div>';
        html += '</div>';
        
        $('#inputFieldSparepart').append(html);
    });

    // remove row
    $(document).on('click', '#deleteRowInputSparepart', function () {
        $(this).closest('#rowInputAddSparepart').remove();
    });
</script>
<script>
    // add field
    $("#addFieldKaryawan").click(function () {
        let html = '';      

        html += '<div class="row align-items-center" id="rowInputAddKaryawan">';
        html += '<div class="col-lg-11">';
        html += '<div class="form-group">'
        html += '<label for="karyawan">Karyawan</label>';
        html += '<select class="form-control form-control-sm" id="karyawan" name="karyawan[]">';
        html += '<option value="">--Pilih--</option>';
        html += '@foreach ($karyawan as $item)';
        html += '<option {{ old("karyawan") == $item->id ? "selected" : ""}} value="{{ $item->id }}">{{ $item->nama }}</option>';
        html += '@endforeach';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        //
        html += '<div class="col-lg-1 mt-1">';
        html += '<button type="button" id="deleteRowInputKaryawan" class="btn btn-sm btn-outline-danger">';
        html += '<i class="ti ti-trash"></i>';
        html += '</button>';
        html += '</div>';
        html += '</div>';
        
        $('#inputFieldKaryawan').append(html);
    });

    // remove row
    $(document).on('click', '#deleteRowInputKaryawan', function () {
        $(this).closest('#rowInputAddKaryawan').remove();
    });
</script>
<script>
    // add field
    $("#addFieldConsumable").click(function () {
        let html = '';      

        html += '<div class="row align-items-center my-4" id="rowInputAddConsumable">';
        html += '<div class="col-lg-10">';
        html += '<div class="form-group">';
        html += '<label for="consumable">Consumable</label>';
        html += '<input name="consumable[]" type="text" class="form-control form-control-sm" id="consumable" placeholder="Input consumable" autocomplete="off">';
        html += '</div>';
        html += '</div>';
        // 
        html += '<div class="col-lg-2">';
        html += '<div class="form-group">';
        html += '<label for="satuanConsumable">Satuan Consumable</label>';
        html += '<input name="satuanConsumable[]" type="text" class="form-control form-control-sm" id="satuanConsumable" placeholder="Contoh: Lot/Can/Kg/Cm/dst" autocomplete="off">';
        html += '</div>';
        html += '</div>';
        //
        html += '<div class="col-lg-10">';
        html += '<div class="form-group">';
        html += '<label for="hargaConsumable">Harga Consumable</label>';
        html += '<input name="hargaConsumable[]" type="text" class="form-control form-control-sm" placeholder="Input nominal tanpa titik" autocomplete="off">';
        html += '</div>';
        html += '</div>';

        html += '<div class="col-lg-2">';
        html += '<div class="form-group">';
        html += '<label for="QtyConsumable">Qty Consumable</label>';
        html += '<input name="qtyConsumable[]" type="number" class="form-control form-control-sm" id="qtyConsumable" placeholder="0" autocomplete="off">';
        html += '</div>';
        html += '</div>';
        
        html += '<div class="col-lg-1 mt-1">';
        html += '<button type="button" id="deleteRowInputConsumable" class="btn btn-sm btn-outline-danger">';
        html += '<i class="ti ti-trash"></i>';
        html += '</button>';
        html += '</div>';
        html += '</div>';
        
        $('#inputFieldConsumable').append(html);
    });

    // remove row
    $(document).on('click', '#deleteRowInputConsumable', function () {
        $(this).closest('#rowInputAddConsumable').remove();
    });
</script>
<script>
    // add field
    $("#addFieldJasa").click(function () {
        let html = '';      

        html += '<div class="row align-items-center" id="rowInputAddJasa">';
        html += '<div class="col-lg-7">';
        html += '<div class="form-group">';
        html += '<label for="jasa">Jasa</label>';
        html += '<select name="jasa[]" class="form-control form-control-sm" id="jasa">';
        html += '<option  value="">-- Pilih --</option>';
        html += '@foreach ($jasa as $item)';
        html += '<option {{ old("jasa") == $item->id ? "selected" : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>';
        html += '@endforeach';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        // 
        html += '<div class="col-lg-3">';
        html += '<div class="form-group">';
        html += '<label for="QtyJasa">Qty Jasa</label>';
        html += '<input name="qtyJasa[]" type="number" class="form-control form-control-sm" id="qtyJasa" placeholder="0" autocomplete="off" min=0>';
        html += '</div>';
        html += '</div>';
        //
        html += '<div class="col-lg-1 mt-1">';
        html += '<button type="button" id="deleteRowInputJasa" class="btn btn-sm btn-outline-danger">';
        html += '<i class="ti ti-trash"></i>';
        html += '</button>';
        html += '</div>';
        html += '</div>';
        
        $('#inputFieldJasa').append(html);
    });

    // remove row
    $(document).on('click', '#deleteRowInputJasa', function () {
        $(this).closest('#rowInputAddJasa').remove();
    });
</script>
@endpush