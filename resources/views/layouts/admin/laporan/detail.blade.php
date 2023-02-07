@extends('master')
@section('content')
    <div class="container">
        <div class="card p-3">
            <h4 class="text-center">{{ $data->transaksi->nama }}</h4>
            <small class="text-center mb-3">Penanggung Jawab: {{ $data->transaksi->penanggung_jawab }}</small>
            <div class="d-flex justify-content-between mb-3">
                <p>Status Pengerjaan : {{ $data->transaksi->status_pengerjaan }}</p>
                <p>Status Pembayaran : {{ $data->transaksi->status_pembayaran }}</p>
            </div>
            <p class="mb-3">Alamat : {{ $data->transaksi->lokasi }}</p>
            <p class="mb-3">Perihal : {{ $data->transaksi->perihal }}</p>
            <p class="mb-3">Tanggal : {{ $data->transaksi->tanggal }}</p>
            <div class="d-flex justify-content-between">
                <p>Harga Sparepart Total : @currency($data->total_harga_sparepart)</p>
                <p>Harga Jasa Total : @currency($data->total_harga_jasa)</p>
                <p>Harga Consumable Total : @currency($data->total_harga_consumable)</p>
            </div>
            <hr class="mb-4">
            <h4 class="text-end">Total Harga : @currency($data->total_harga)</h4>

            <a class="btn btn-primary mt-4" style="width: 200px" href="{{ route('admin.laporan.hari') }}">Kembali</a>
        </div>
    </div>
@endsection