<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <p align="center"><b>Laporan Pegawai</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Kegiatan</th>
                <th>Jabatan</th>
                <th>Tanggal</th>
            </tr>
            @foreach ($laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->kegiatan }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->tanggal }}</td>
                </tr>
            @endforeach

        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
