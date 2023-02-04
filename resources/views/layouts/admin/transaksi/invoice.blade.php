<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

  <link rel="stylesheet" href="{{ asset('assets/css/paper.css') }}">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 }</style>

</head>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
    <article>
      <div class="kop">
        <img src="{{ asset('assets/images/koppsurat.PNG') }}" alt="kopsurat" width="100%">
      </div>

      {{-- <hr class="horizontal-line"> --}}
      
      <table>
        <tr class="quotation">
          <th colspan="4">
            QUOTATION
          </th>
        </tr>
        <tr>
          <td class="title">To</td>
          <td>: {{ $transaksi->nama }}</td>
          <td class="title">Date</td>
          <td>: {{ date('d M Y', strtotime($transaksi->tanggal)) }}</td>
        </tr>
        <tr>
          <td class="title">Att</td>
          <td>: {{ $transaksi->penanggung_jawab }}</td>
          <td class="title">Subject</td>
          <td>: QUOTATION</td>
        </tr>
        <tr>
          <td class="title">Add</td>
          <td>: Karawang, Jawa barat</td>
          <td class="title">Outreff</td>
          <td>: MPE00{{ $transaksi->id }}KRW</td>
        </tr>
        <tr>
          <td class="title">Hal</td>
          <td colspan="3">: {{ $transaksi->perihal }}</td>
        </tr>
      </table>

      <div class="pembukaan">
        <p>Dengan Hormat, </p>
        <p>Terima kasih atas kepercayaan dan kerja sama yang diberikan kepada kami,sesuai dengan Permintaan Bapak/Ibu, Berikut ini kami mengajukan penawaran untuk {{ $transaksi->perihal }}</p>
      </div>

      <table class="rincian">
        <thead>
          <tr>
            <th class="rincian" width="20px">NO</th>
            <th class="rincian">DESCRIPTION</th>
            <th class="rincian">QTY</th>
            <th class="rincian">SATUAN</th>
            <th class="rincian">UNIT PRICE (RP)</th>
            <th class="rincian">AMOUNT (RP)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="rincian title number">A</td>
            <td class="rincian title">PARTS For Purchased</td>
            <td class="rincian"></td>
            <td class="rincian"></td>
            <td class="rincian"></td>
            <td class="rincian"></td>
          </tr>
          @foreach ($transaksi->t_sparepart as $item)
          <tr>
            <td class="rincian number">{{ $loop->iteration }}</td>
            <td class="rincian">{{ $item->sparepart->nama }} : {{ $item->sparepart->type }} ({{ $item->sparepart->merek }})</td>
            <td class="rincian qty">{{ $item->qty }}</td>
            <td class="rincian satuan">{{ $item->sparepart->satuan }}</td>
            <td class="rincian nominal">@currency($item->sparepart->harga)</td>
            <td class="rincian nominal">@currency($transaksi->subtotal->total_harga_sparepart)</td>
          </tr>
          @endforeach
          <tr>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
          </tr>
          <tr>
            <td class="rincian title number">B</td>
            <td class="rincian title">Consumable</td>
            <td class="rincian"></td>
            <td class="rincian"></td>
            <td class="rincian"></td>
            <td class="rincian"></td>
          </tr>
          @foreach ($transaksi->consumable as $item)
          <tr>
            <td class="rincian number">{{ $loop->iteration }}</td>
            <td class="rincian">{{ $item->nama }}</td>
            <td class="rincian qty">{{ $item->qty }}</td>
            <td class="rincian satuan">{{ $item->satuan }}</td>
            <td class="rincian nominal">@currency($item->harga)</td>
            <td class="rincian nominal">@currency($transaksi->subtotal->total_harga_consumable)</td>
          </tr>
          @endforeach
          <tr>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
          </tr>
          <tr>
            <td class="rincian title number">C</td>
            <td class="rincian title">Labour Cost</td>
            <td class="rincian"></td>
            <td class="rincian"></td>
            <td class="rincian"></td>
            <td class="rincian"></td>
          </tr>
          @foreach ($transaksi->t_jasa as $item)
          <tr>
            <td class="rincian number">{{ $loop->iteration }}</td>
            <td class="rincian">{{ $item->jasa->nama }}</td>
            <td class="rincian qty">{{ $item->qty }}</td>
            <td class="rincian satuan">{{ $item->jasa->satuan }}</td>
            <td class="rincian nominal">@currency($item->jasa->harga)</td>
            <td class="rincian nominal">@currency($transaksi->subtotal->total_harga_jasa)</td>
          </tr>
          @endforeach
          <tr>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
            <td class="rincian empty"></td>
          </tr>
          <tr>
            <td colspan="5" class="footer">GRAND TOTAL</td>
            <td class="rincian nominal">@currency($transaksi->subtotal->total_harga)</td>
          </tr>
        </tbody>
      </table>

      <div class="sk">
        <p>Syarat dan Ketentuan :</p>
        <ol>
          <li>Pembayaran DP 50%</li>
          <li>50% Setelah Pekerjaan Selesai</li>
          <li>Pembayaran via Transfer Bank BNI ( 0831783031/Syahrial Prasetya )</li>
          <li>Garansi Pekerjaan 1 Bulan</li>
          <li>Penawaran Berlaku 1 minggu</li>
        </ol>
        <p>Demikian penawaran ini kami buat, selanjutnya kami tunggu konfirmasi dari Bpk/Ibu atas kerja samanya kami ucapkan Terimakasih.
        <br>
        <b>Hormat Kami.</b>
        </p>
      </div>

      <table class="ttd">
        <thead>
          <tr>
            <th colspan="2" class="ttd">CV.MITRA PRATAMA ENGINEERING</th>
            <th class="ttd">CV. TRIJAYA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="ttd column"></td>
            <td class="ttd column"></td>
            <td class="ttd column"></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th class="ttd">SYAHRIAL PRASETYA</th>
            <th class="ttd">ANISA NURUL RAMADHAN</th>
            <th class="ttd"></th>
          </tr>
        </tfoot>
      </table>
    </article>

  </section>

</body>
<script>
  window.print();
</script>
</html>