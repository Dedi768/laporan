<html>
<head>
    <title> laporan kinerja </title>
    <style type= "text/css">
    body {font-family: arial; background-color : #ccc }
    .rangkasurat {width : 980px;margin:0 auto;background-color : #fff;height: 29.7cm;width: 21cm;padding: 20px;}
    table {border-bottom : 3px solid #000; padding: 2px}
    .tengah {text-align : center;line-height: 10px;padding-left: 1px;}
    .kop {font-size: 10;text-align: center;padding-left: 2cm;padding-right: 2cm;}
    .identitas {border-bottom: 0;}
    .tableizer-table {width:680px;border-color: #000;}
    .tandatangan {width:680px;border-bottom:0;padding-bottom: 3cm;padding-top: 5cm;text-align: center;}
    .bold {font-weight: bold; font-size: 14px}
     </style >
</head>
<body>
<div class = "rangkasurat">
     <table width = "100%">
           <tr>
                 <td> <img src="{{ asset('/image/logo_copy.png') }}" width="120px"> </td>
                 <td class = "tengah">
                       <h2>PEMERINTAH DAERAH KABUPATEN BANDUNG</h2>
                       <h2>DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK</h2>
                       <p>Jl.Raya Soreang No.17, Pamekaran, Kec.Soreang, Kabupaten Bandung, Jawa Barat 40912</p>
                 </td>
            </tr>
     </table >
     
<div class="kop">
    <h1>DAFTAR PENILAIAN PELAKSANAAN PEKERJAAN NON APARATUR SIPIL NEGARA </h1>
    <table class="identitas">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ Auth::user()->jabatan }}</td>
        </tr>
        <tr>
            <td>Perangkat Daerah</td>
            <td>:</td>
            <td>DISKOMINFO</td>
        </tr>
        <tr>
            <td>Bulan/TA</td>
            <td>:</td>
            <td>{{$period}}</td>
        </tr>
    </table>
    <style type="text/css">
        table.tableizer-table {
            font-size: 12px;
            border: 1px solid #CCC; 
            font-family: Arial, Helvetica, sans-serif;
        } 
        .tableizer-table td {
            padding: 4px;
            margin: 3px;
            border: 1px solid #CCC;
        }
    </style>
    <table class="tableizer-table">
    <thead><tr class="tableizer-firstrow"><th></th><th>&nbsp;</th></tr></thead><tbody>
     <tr><td class="bold">A</td><td class="bold">Hasil Kinerja</td></tr>
     <tr><td class="bold">No</td><td class="bold">Uraian Pekerjaan</td></tr>
     @foreach ($printtanggal as $item)
     <tr>
        <td>{{ $loop->iteration }}</td><td> {{ $item->kegiatan }} &nbsp;</td></tr>
     @endforeach
     <tr><td class="bold">B</td><td class="bold">Perilaku Kerja</td></tr>
     <tr><td>1</td><td>Disiplin Kehadiran (Baik/Sedang/Cukup/Kurang)</td></tr>
     <tr><td>2</td><td>Kerja Sama(Baik/Sedang/Cukup/Kurang)</td></tr>
    </tbody></table>

    <style type="text/css">
        table.tandatangan {
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .tandatangan td {
            padding: 4px;
            margin: 3px;
        }
        .tandatangan th {
            background-color: #ffff; 
            color: #FFF;
            font-weight: bold;
        }
    </style>
    <table class="tandatangan">
    <thead><tr class="tableizer-firstrow"><th></th><th>&nbsp;</th></tr></thead><tbody>
     <tr><td>YANG DINILAI</td><td>ATASAN LANGSUNG</td></tr>
     <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
     <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
     <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
     <tr><td>{{ Auth::user()->name }}</td><td>NAMA</td></tr>
     <tr><td>&nbsp;</td><td>NIP</td></tr>
    </tbody></table>
</div>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>