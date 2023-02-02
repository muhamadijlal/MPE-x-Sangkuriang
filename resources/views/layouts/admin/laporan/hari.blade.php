@extends('master')
@section('content')
    <div class="container">
        <div class="card p-3">
            <h4 class="card-title">Laporan Hari Ini</h4>
            <table class="table table-hover">
                <tbody>
                  <tr>
                    <th colspan="3">Transaksi Masuk :</th>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
@endsection