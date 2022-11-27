@extends('template.master')

@section('judul_konten')
   
@endsection

@section('main')
    <div class="ml-3 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Laporan</h3>
            </div>

            
                @csrf
                <input type="hidden" name="id" value="{{ $laporan->id}}">

                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        {{ $laporan->nama }}
                       
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP :</label>
                        {{ $laporan->nip }}
                       
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        {{ $laporan->jabatan }}
                       
                    </div>

                    <div class="form-group">
                        <label for="kegiatan">Kegiatan :</label>
                        {{ $laporan->kegiatan }}
                        
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal :</label>
                        {{ $laporan->tanggal }}
                    </div>

                    <div class="form-group">
                        <label for="status">Status :</label>
                        {{ $laporan->status }}
                    </div>
                </div>
            </div>
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Penilaian</h3>
                    </div>
                <div class="card-body">
                <form action="/laporan/validasi" method="POST">
                @csrf
               
                  

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </div>
            </form>
        </div>
                </div>
        </div>
            @endsection
