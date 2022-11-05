@extends('template.master')



@section('main')
    <div class="ml-3 mt-3">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Tambah Laporan</h3>
            </div>

            <form action="/laporan/tambah" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ old('nama') }}" placeholder="Masukkan Nama">
                       
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip"
                            value="{{ old('nip') }}" placeholder="Masukkan nip">
                       
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan"
                            value="{{ old('jabatan') }}" placeholder="Masukkan Jabatan">
                        
                    </div>

                    <div class="form-group">
                        <label for="kegiatan">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan"
                            value="{{ old('kegiatan') }}" placeholder="Masukkan kegiatan">
                       
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal') }}" placeholder="Masukkan Tanggal">
                            
                        
                    </div>
                  
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success"> Create</button>
                </div>
            </form>
        </div>
            @endsection

            <script src="{{ asset('js/date.js') }}"></script>