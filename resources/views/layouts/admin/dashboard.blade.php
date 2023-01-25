@extends('master')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <p class="card-title">Order Details</p>
            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
            <div class="d-flex flex-wrap mb-5">
            <div class="mr-5 mt-3">
                <p class="text-muted">Order value</p>
                <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
            </div>
            <div class="mr-5 mt-3">
                <p class="text-muted">Orders</p>
                <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
            </div>
            <div class="mr-5 mt-3">
                <p class="text-muted">Users</p>
                <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
            </div>
            <div class="mt-3">
                <p class="text-muted">Downloads</p>
                <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
            </div> 
            </div>
            <canvas id="order-chart" style="display: block; width: 288px; height: 144px;" width="288" height="144" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>
@endsection