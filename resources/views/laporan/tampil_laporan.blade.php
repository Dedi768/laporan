@extends('template.master')

@section('judul_konten')
    Laporan
@endsection

@section('main')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title"><b>Data Table</b></h1>
        </div>

        <div class="card-body">
            @if (Auth::user()->role == 2)
                <a href="/laporan/create" class="btn btn-success mb-2">Buat Laporan</a>

                {{--<a href="/laporan/print" target="_blank" class="btn btn-primary mb-2">Print <i class="fas fa-print"></i></a>--}}
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ date("d-m-Y", strtotime($item->tanggal)) }}</td>
                            <td>
                                @if ($item->status == 'belum divalidasi')
                                    <i class=" fas fa-times"></i>
                                @else
                                    <i class=" fas fa-check"></i>
                                @endif
                            </td>

                            <td>
                                @if (Auth::user()->role == 2)
                                    @if ($item->status == 'belum divalidasi')
                                        <a href="/laporan/hapus/{{ $item->id }}" class="btn btn-danger mb-2">Hapus</a>

                                        <a href="/laporan/edit/{{ $item->id }}" class="btn btn-warning mb-2">Edit</a>
                                    @else
                                    @endif
                                @endif
                                @if (Auth::user()->role == 1 && $item->status == 'belum divalidasi')
                                    <a href="/laporan/validasi/{{ $item->id }}"
                                        class="btn btn-success mb-2">Validasi</a>
                                @else
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
