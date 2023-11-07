<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Homepage</title>
    <style>
        .navbar a {
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #66B3FF;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/" style="color: yellow; font-weight: bold;">
                Politeknik Negeri Bengkalis | Rekayasa Perangkat Lunak
            </a>
            <a href="{{ route('auth.prodi') }}">Prodi RPL</a>
            <a href="{{ route('auth.berita') }}">Berita RPL</a>
            <a href="{{ route('auth.alumni') }}">Profile Lulusan RPL</a>
            <a href="{{ route('auth.aktifitas') }}">Aktivitas Mahasiswa RPL</a>
        </div>
    </nav>
    <div class="container" style="margin-top: 150px">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-secondary" style="color: black">SELAMAT DATANG</h1>
                <h4 class="text-secondary">
                    Di Perpustakaan Politeknik Negeri Bengkalis
                </h4>
                <h6 class="mt-3">
                    Silahkan
                    <a href="{{ route('auth.login') }}" style="text-decoration: none">Masuk</a>
                    atau <a href="{{ route('auth.register') }}" style="text-decoration: none">Daftar</a>
                    Jika anda belum punya akun
                </h6>
            </div>
        </div><br><br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <img src="{{ asset('img/2.jpeg') }}" alt="Teknik Informatika">
                    <div class="card-body">
                        <h5 class="card-title">TEKNIK INFORMATIKA</h5>
                        <p class="card-text">Teknik Informatika adalah cabang ilmu teknik yang berkaitan dengan pengembangan, pemrograman, dan pengelolaan sistem komputer, perangkat lunak, serta aplikasi berbasis komputer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('img/3.jpeg') }}" alt="Teknik Mesin">
                    <div class="card-body">
                        <h5 class="card-title">TEKNIK MESIN</h5>
                        <p class="card-text">Teknik Mesin adalah cabang ilmu teknik yang berkaitan dengan perancangan, pengembangan, produksi, dan pemeliharaan mesin, peralatan mekanis, dan sistem otomasi.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('img/4.jpeg') }}" alt="Teknik Sipil">
                    <div class="card-body">
                        <h5 class="card-title">TEKNIK SIPIL</h5>
                        <p class="card-text">Teknik Sipil adalah cabang ilmu teknik yang berkaitan dengan perancangan, konstruksi, pemeliharaan jalan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></script>
</body>
</html>
