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
                <input type="hidden" name="id" value="{{ $laporan->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $laporan->nama }}" placeholder="Masukkan Nama">
                        
                       
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP :</label>
                        <input type="text" class="form-control" id="nip" name="nip"
                            value="{{ $laporan->nip }}" placeholder="Masukkan Nip">
                        
                       
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan"
                            value="{{ $laporan->jabatan }}" placeholder="Masukkan Jabatan">
                        
                       
                    </div>

                    <div class="form-group">
                        <label for="kegiatan">Kegiatan :</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan"
                            value="{{ $laporan->kegiatan }}" placeholder="Masukkan Kegiatan">
                        
                        
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal :</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal"
                            value="{{ $laporan->tanggal }}" placeholder="Masukkan Tanggal">
                       
                    </div>

                   
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
            @endsection
