<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">FORM REGISTER USER</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" required="">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-fingerprint"></i> NIP</label>
                    <input type="text" name="nip" class="form-control" placeholder="Nip" required="">
                </div>

                <div class="form-group">
                    <label><i class="fas fa-landmark"></i> Perangkat Daerah</label>
                    <select name="perangkat_daerah" class="form-control" id="exampleFormControlSelect1">
                        <option>-Pilih Perangkat Daerah-</option> 
                        <option value="Bidang Penyelenggaraan Informasi dan Komunikasi Publik">Bidang Penyelenggaraan Informasi dan Komunikasi Publik</option>
                        <option value="Bidang Keamanan Informasi dan Persandian">Bidang Keamanan Informasi dan Persandian</option>
                        <option value="Bidang Teknologi Informasi dan Komunikasi">Bidang Teknologi Informasi dan Komunikasi</option>
                        <option value="Bidang Aplikasi Informatika">Bidang Aplikasi Informatika</option>
                        <option value="Bidang Statistik">Bidang Statistik</option>
                      </select>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-user-tie"></i> Atasan</label>
                    <select name="atasan" class="form-control" id="exampleFormControlSelect1">
                        <option value="0">-Pilih Atasan-</option>
                        @foreach ($leaderlist as $leader)
                        <option value="{{ $leader->id }}">{{ $leader->name }}</option>
                        @endforeach
                        
                      </select>
                </div>

                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1"><i class="fas fa-user-circle"></i> Role</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                      <option>-Pilih Role-</option> 
                      <option value="1">Atasan</option>
                      <option value="2">Pegawai</option>
                      
                    </select>
                  </div>
                
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="/login">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html>