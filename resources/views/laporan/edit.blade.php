@extends('template.master')

@section('judul_konten')
@endsection

@section('main')
    <div class="ml-3 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Laporan</h3>
            </div>

            <form action="/laporan/modify" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $laporan->id }}">
                <div class="card-body">
                
                    <div class="form-group">
                        <label for="kegiatan">Kegiatan :</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan"
                            value="{{ $laporan->kegiatan }}" placeholder="Masukkan Kegiatan">


                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal :</label>
                        {{--  input type="text" class="form-control" id="tanggal" name="tanggal" --}}
                        <input type="text" class="datepicker-here form control" date-language='en' name="tanggal"
                            data-multiple-dates="3" data-multiple-dates-separator=", " data-position='top left'
                            value="{{ $laporan->tanggal }}" placeholder="Masukkan Tanggal">

                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    @endsection
