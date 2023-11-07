<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengenalan Program Studi RPL</title>
    <!-- Memasukkan CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
<div class="card mb-3">
  <img src="{{ asset('img/2.jpeg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">REKAYASA PERANGKAT LUNAK</h5>
    <p class="card-text">Prodi RPL adalah program studi di mana mahasiswa mempelajari pengembangan perangkat lunak, termasuk analisis, perancangan, pengujian, dan pemeliharaan perangkat lunak. Ini adalah salah satu prodi yang sangat relevan dengan perkembangan teknologi informasi dan komunikasi.</p>
  </div>
</div>
   
</section>

<!-- Courses -->
<section id="courses" class="bg-light py-5">
    <div class="container">
        <h2>Kursus</h2>
        <p>
            Prodi RPL menawarkan beragam kursus yang mencakup pemrograman, basis data, pengembangan web, kecerdasan buatan, dan banyak lagi. Mahasiswa akan mendapatkan pemahaman mendalam tentang perangkat lunak dan teknologi terkini.
        </p>
    </div>
</section>

<!-- Facilities -->
<section id="facilities" class="container mt-5">
    <h2>Fasilitas</h2>
    <p>
        Kami menyediakan fasilitas modern dan dukungan teknis untuk mendukung pembelajaran dan penelitian mahasiswa. Laboratorium komputer, perpustakaan, dan ruang kelas yang nyaman adalah beberapa contoh fasilitas yang tersedia.
    </p>
</section>

<!-- Contact -->
<section id="contact" class="bg-light py-5">
    <div class="container">
        <h2>Contact Us</h2>
        <p>
            Untuk informasi lebih lanjut tentang Prodi RPL, silakan hubungi kami melalui email atau telepon.
        </p>
        <p>Email: info@prodirpl.ac.id</p>
        <p>Telepon: (123) 456-7890</p>
    </div>
</section>

<!-- Memasukkan JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
