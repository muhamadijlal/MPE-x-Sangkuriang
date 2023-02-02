@extends('master')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <p class="card-title">Data Bulanan</p>
            <div class="d-flex flex-wrap mb-5">
            <div class="mr-5 mt-3">
                <p class="text-muted">Total Penerimaan Uang</p>
                <h3 class="text-primary fs-30 font-weight-medium">Rp {{ $penerimaan }}</h3>
            </div>
            <div class="mr-5 mt-3">
                <p class="text-muted">Total Pengeluaran</p>
                <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
            </div>
            <div class="mr-5 mt-3">
                <p class="text-muted">Total PO</p>
                <h3 class="text-primary fs-30 font-weight-medium">{{ $po }}</h3>
            </div>
            <div class="mt-3">
                <p class="text-muted">Total Transaksi</p>
                <h3 class="text-primary fs-30 font-weight-medium">{{ $totalTransaksi }}</h3>
            </div> 
            </div>
            <div>
              <canvas id="myChart"></canvas>
            </div>
            
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
  const ctx = document.getElementById('myChart');
  var jan = {{ Js::from($jan) }}
  var feb = {{ Js::from($feb) }}
  var mar = {{ Js::from($mar) }}
  var apr = {{ Js::from($apr) }}
  var may = {{ Js::from($may) }}
  var jun = {{ Js::from($jun) }}
  var jul = {{ Js::from($jul) }}
  var aug = {{ Js::from($aug) }}
  var sept = {{ Js::from($sept) }}
  var oct = {{ Js::from($oct) }}
  var nov = {{ Js::from($nov) }}
  var dec = {{ Js::from($dec) }}
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['jan','feb','mar','apr','may','jun','jul','aug','sept','oct','nov','dec'],
      datasets: [{
        label: 'Total Data Transaksi Tahun Ini',
        data: [jan,feb,mar,apr,may,jun,jul,aug,sept,oct,nov,dec],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@endpush