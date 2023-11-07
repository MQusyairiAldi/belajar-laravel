<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Menggunakan versi yang tepat dari Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <!-- Perbaikan link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<body>
    <div class="container">
        <a href="/">
            <!-- Menggunakan kelas "bi" untuk icon Bootstrap -->
            <i class="bi-arrow-left h1"></i>
        </a>
    </div>

    <div class="container mt-3">
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Registrasi Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 60px">
        <div class="card" style="width: 35%">
            <div class="card-body p-4">
                <h3 class="card-title text-center">Register</h3>
                <form action="{{ route('postRegister') }}" method="POST">
                    @csrf 
                    <div class="form-group mt-4">
                        <label for="name" class="text-secondary">Nama Anda</label>
                        <input type="text" id="name" class="form-control border border-secondary form-control-lg" name="name" required value="{{ old('name') }}">
                        <span>
                            @error('name')
                                {{ $message }}
                            @enderror 
                        </span>
                    </div>
                    <div class="form-group mt-1">
                        <label for="email" class="text-secondary">Email Anda</label>
                        <input type="email" id="email" class="form-control border border-secondary form-control-lg" name="email" required value="{{ old('email') }}">
                        <span>
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-1">
                        <label class="text-secondary">Pilih Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" value="laki-laki" id="inlineRadio1">
                            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" value="perempuan" id="inlineRadio2">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="password" class="text-secondary">Password Anda</label>
                        <input type="password" id="password" class="form-control border border-secondary form-control-lg" name="password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-1">
                        <label for="password_confirmation" class="text-secondary">Konfirmasi Password Anda</label>
                        <input type="password" id="password_confirmation" class="form-control border border-secondary form-control-lg" name="password_confirmation" required>
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Register</button>
                </form>
                <p class="mt-2 text-center">
                    Sudah Punya Akun?
                    <a href="{{ route('auth.login') }}" style="text-decoration: none">Ayo Masuk!!</a>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Perbaikan script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
