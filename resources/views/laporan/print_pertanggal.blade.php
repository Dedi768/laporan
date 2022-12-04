<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/print_pertanggal.css') }}">
    
    <style>
        table.static {
            position: relative;
            /* left: 3%; */
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Laporan</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Pegawai Per Tanggal</b></p>

        <div class="container">
        <table class="static none-border"  align="center" rules="all">
        
        <tr class="none-border">
            <td>LAMPIRAN II</td>
            <td class="none-border">:</td> 
            <td>PERATURAN BUPATI</td>
        </tr>

        <tr class="none-border">
            <td>NOMOR</td>
            <td class="none-border">:</td> 
            <td>46 TAHUN 2020</td>
        </tr>
        <tr class="none-border">
            <td>TENTANG</td>
            <td class="none-border">:</td> 
            <td>PERUBAHAN ATAS PERATURAN BUPATI </td>
        </tr>
       
        <tr class="none-border">
            <td></td>
            <td class="none-border"></td> 
            <td>NOMOR 107 TAHUN 2019 TENTANG TENAGA</td>
        </tr>
        
        <tr class="none-border">
            <td></td>
            <td class="none-border"></td> 
            <td>NON APARATUR SIPIL NEGARA</td>
        </tr>
            
        </table>
    </div>

    <div class="text-container">
        <p>FORMAT DAFTAR PENILAIAN PELAKSANAAN PEKERJAAN NON APARATUR SIPIL NEGARA</p>
    </div>

    <div class="kop-container">
        <h4 class="b-bottom">KOP PERANGKAT DAERAH</h4>
    </div>

    <div class="text-container">
        <p>FORMAT DAFTAR PENILAIAN PELAKSANAAN PEKERJAAN NON APARATUR SIPIL NEGARA</p>
    </div>

    <div class="b-container container">
        <table class="static none-border" rules="all">
        
        <tr class="none-border">
            <td>Nama</td>
            <td class="none-border">:</td> 
            <td>{{ Auth::user()->name }}</td>
        </tr>

        <tr class="none-border">
            <td>NIP</td>
            <td class="none-border">:</td> 
            <td>{{ Auth::user()->nip }}</td>
        </tr>
        <tr class="none-border">
            <td>Jabatan</td>
            <td class="none-border">:</td> 
            <td>{{ Auth::user()->jabatan}}</td>
        </tr>
            
        </table>
    </div>
        <table class="static mt-5" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>A</th>
                <th style=" text-align: left"colspan="2">HASIL KERJA</th>
                
            </tr>
            
            <tr>
                <th rowspan="2">No</th>
                <th colspan="2">Uraian Pekerjaan</th>
                
            </tr>

            <tr>
                
                <th>Kegiatan</th>
                <th>Tanggal</th>
            </tr>
            @foreach ($printtanggal as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->kegiatan }}</td>
                    <td>{{ date("d-m-Y", strtotime($item->tanggal)) }} </td>
                </tr>
            @endforeach

        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
