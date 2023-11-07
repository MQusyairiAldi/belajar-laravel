<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengenalan Program Studi RPL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Memasukkan CSS Bootstrap -->
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

<!-- Navbar -->
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

<!-- Overview -->
<section id="overview" class="container mt-5">
    <h1>Profil Lulusan Program Studi Rekayasa Perangkat Lunak (RPL)</h1>
    <p>
        Prodi RPL adalah program studi di mana mahasiswa mempelajari pengembangan perangkat lunak, termasuk analisis, perancangan, pengujian, dan pemeliharaan perangkat lunak. Ini adalah salah satu prodi yang sangat relevan dengan perkembangan teknologi informasi dan komunikasi.
    </p>
</section>

<!-- Courses -->
<section id="courses" class="bg-light py-5">
    <div class="container">
        
        <img src="{{ asset('img/1.jpg')}}" width="100" height="100" style="border-radius : 100%">
        <p>
        <H4>Nama : M. Qusyairi Aldi</H4> 
           <h4>IPK : 4</h4>
        </p>
        <br><br>
        
        <img src="{{ asset('img/6.png')}}" width="100" height="100" style="border-radius : 100%">
        <p>
        <H4>Nama : M. Qusyairi Aldi</H4> 
           <h4>IPK : 4</h4>
        </p><br><br>
        
        <img src="{{ asset('img/7.jpeg')}}" width="100" height="100" style="border-radius : 100%">
        <p>
           <H4>Nama : M. Qusyairi Aldi</H4> 
           <h4>IPK : 4</h4>
</P>
    </div>
</section>



<!-- Memasukkan JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
