@extends('template.master')

@section('judul_konten')
    Cetak Laporan
@endsection

@section('main')
    <div class="car-body">
        <div class="input-group mb-3">
            <label for="label">Tanggal Awal</label>
            <input type="date" name="tglawal" id="tglawal" class="form-control" />
        </div>

        <div class="input-group mb-3">
            <label for="label">Tanggal Akhir</label>
            <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
        </div>

        <div class="input-group mb-3">
            <a href="" onclick="this.href='/laporan/print_pertanggal/'+ document.getElementById('tglawal').value +
            '/'+ document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary col-md-12">Cetak Laporan Pertanggal <i
                    class="fas fa-print"></i></a>
        </div>

    </div>
@endsection
