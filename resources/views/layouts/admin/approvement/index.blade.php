@extends('master')

@section('content')
<div class="col-lg-12">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card p-4">
            <div class="card-body">
                <h4 class="card-title">Form Approvement</h4>
                <form class="forms-sample mt-5" action="{{ route('admin.transaksi.approvementStore', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="status_pembayaran">Status Pembayaran </label>
                            <select class="form-control form-control-sm @error('status_pembayaran')
                                is-invalid
                            @enderror" id="status_pembayaran" name="status_pembayaran">
                                <option value="">--Pilih--</option>
                                <option {{ old('status_pembayaran') == 'belum bayar' ? 'selected' : ''}} value="belum bayar">Belum bayar</option>
                                <option {{ old('status_pembayaran') == 'dp' ? 'selected' : ''}} value="dp">Dp</option>
                                <option {{ old('status_pembayaran') == 'lunas' ? 'selected' : ''}} value="lunas">Lunas</option>
                            </select>
                            @error('status_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="status_pengerjaan">Status Pengerjaan</label>
                            <select class="form-control form-control-sm @error('status_pengerjaan')
                                is-invalid
                            @enderror" id="status_pengerjaan" name="status_pengerjaan">
                                <option value="">--Pilih--</option>
                                <option {{ old('status_pengerjaan') == 'pending' ? 'selected' : ''}} value="pending">Pending</option>
                                <option {{ old('status_pengerjaan') == 'proses' ? 'selected' : ''}} value="proses">Proses</option>
                                <option {{ old('status_pengerjaan') == 'selesai' ? 'selected' : ''}} value="selesai">Selesai</option>
                            </select>
                            @error('status_pengerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload bukti</label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="my-5 float-end">
                        <button class="btn btn-light">Cancel</button>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card p-4">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="card-title">Detail Transaksi</h4>
                </div>
                <table width="100%">
                    <tr>
                        <th>Nama Perusahaan :</th>
                        <td class="text-end">{{ $transaksi->nama }}</td>
                    </tr>
                    <tr>
                        <th>Penanggung jawab :</th>
                        <td class="text-end">{{ $transaksi->penanggung_jawab }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi :</th>
                        <td class="text-end">{{ $transaksi->lokasi }}</td>
                    </tr>
                    <tr>
                        <th>Perihal :</th>
                        <td class="text-end">{{ $transaksi->perihal }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal :</th>
                        <td class="text-end">{{ date('d M Y', strtotime($transaksi->tanggal)) }}</td>
                    </tr>
                    <tr>
                        <th>Status Pengerjaan :</th>
                        <td class="text-end">
                            <span class="badge badge-{{ getSPengerjaan($transaksi->status_pengerjaan) }} pt-2 px-2">{{ strtoupper($transaksi->status_pengerjaan) }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Pembayaran :</th>
                        <td class="text-end">
                            <span class="badge badge-{{ getSPembayaran($transaksi->status_pembayaran) }} pt-2 px-2">{{ strtoupper($transaksi->status_pembayaran) }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Harga :</th>
                        <td class="text-end">@currency($transaksi->subtotal->total_harga)</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection