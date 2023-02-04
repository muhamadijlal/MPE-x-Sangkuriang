<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

  <style>
    *{
      font-size: 12px;
    }
    /* kop surat */
    hr.horizontal-line{
      border: 1px solid black;
    }

    /* table */
    table, td, th{
      padding: 3px;
    }

    table{
      margin-top: -6px;
      border-top: 1px solid;
      border-bottom: 2px solid black;
      width: 100%;
      border-collapse: collapse;
    }

    .quotation{
      background: rgb(200, 200, 200);
    }

    .quotation td {
      padding: 5px 0 5px 0;
    }

    /* table rincian */
    table.rincian, td.rincian, th.rincian{
      border: 1px solid;
    }

    td.rincian.title{
      font-weight: bold;
    }

    table.rincian thead{
      background-color:rgb(200, 200, 200);
    }

    td.rincian.number, td.rincian.qty, td.rincian.title.number, .quotation{
      text-align: center;
    }
    
    td.rincian.nominal, td.footer{
      text-align: end;
    }

    td.rincian.empty{
      padding: 10px;
    }

    /* footer table */
    td.footer{
      background-color: gray;
      font-weight: bold;
    }

    /* syarat dan ketentuan */
    ol li{
      line-height: 20px;
    }

    /* table ttd */
    table.ttd{
      width: 75%;
    }

    table.ttd, td.ttd, th.ttd {
      border: 1px solid;
    }

    td.ttd.column{
      height: 100px;
    }

    td.ttd.column:first-of-type, td.ttd.column:nth-child(2), td.ttd.column:nth-child(3){
      width: 160px;
    }
  </style>

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

      <hr class="horizontal-line">
      
      <table>
        <tr class="quotation">
          <td colspan="4">
            QUOTATION
          </td>
        </tr>
        <tr>
          <td class="title">To</td>
          <td>: CV.Trijaya</td>
          <td class="title">Date</td>
          <td>: 12 Desember 2022</td>
        </tr>
        <tr>
          <td class="title">Att</td>
          <td>: Bpk.Eko</td>
          <td class="title">Subject</td>
          <td>: QUOTATION</td>
        </tr>
        <tr>
          <td class="title">Add</td>
          <td>: Karawang, Jawa barat</td>
          <td class="title">Outreff</td>
          <td>: MPE001KRW</td>
        </tr>
        <tr>
          <td class="title">Hal</td>
          <td colspan="3">: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, ratione.</td>
        </tr>
      </table>

      <div class="pembukaan">
        <p>Dengan Hormat, </p>
        <p>Terima kasih atas kepercayaan dan kerja sama yang diberikan kepada kami,sesuai dengan Permintaan Bapak/Ibu, Berikut ini kami mengajukan penawaran untuk Pergantian Kompressor AC Floor Standing Type : RUR18NY14 & RUR13NY14</p>
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
          <tr>
            <td class="rincian number">1</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
          <tr>
            <td class="rincian number">2</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
          <tr>
            <td class="rincian number">3</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
          <tr>
            <td class="rincian number">4</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
          <tr>
            <td class="rincian number">5</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
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
          <tr>
            <td class="rincian number">1</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
          <tr>
            <td class="rincian number">2</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
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
          <tr>
            <td class="rincian number">1</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
          <tr>
            <td class="rincian number">2</td>
            <td class="rincian">Lorem ipsum dolor sit amet.</td>
            <td class="rincian qty">1</td>
            <td class="rincian">Unit</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
            <td class="rincian nominal">Rp. 150.000.00</td>
          </tr>
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
            <td class="rincian nominal">Rp. 150.000.00</td>
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
</html>