<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
            <a class="navbar-item" href="{{ route('admin.home') }}">Home</a>
            <a class="navbar-item" href="{{ route('admin.buku') }}">Buku</a>
            <a class="navbar-item" href="{{ route('admin.dosen') }}">Dosen</a>
            <a class="navbar-item" href="{{ route('admin.berita') }}">Berita</a>
            <a class="navbar-item" href="{{ route('admin.peminjaman') }}">Peminjaman</a>
            <a class="navbar-item" href="{{ route('logout') }}">Logout</a>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h2 class="welcome">Selamat Datang {{ Auth::user()->name }}</h2>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary btn-input" href="{{ route('admin.tambahberita') }}">TAMBAH DATA</a>
            </div>
            <div class="col">
                <form action="{{ route('admin.berita') }}" method="GET">
                    @csrf
                    <div class="input-group mt-3">
                        <input type="search" name="search" class="form-control rounded" placeholder="Cari nama berita"
                            aria-label="Search" aria-describedby="searchaddon" />
                        <button type="submit" class="btn btn-outline-primary">SEARCH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container">
        <table class="table table-primary table-striped" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul Berita</th>
                    <th scope="col">Tanggal Berita</th>
                    <th scope="col">Narasi Berita</th>
                   
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $berita)
                <tr>
                    <td scope="row">{{ $index + $data->firstItem() }}</td>
                    <td><img style="width: 50px" src="{{ asset('/images/' . $berita->gambar) }}" alt="gambar"></td>
                    <td>{{ $berita->judul }}</td>
                    <td>{{ $berita->tanggal }}</td>
                    <td>{{ $berita->narasi }}</td>
                   
                    <td>
    <a class="btn btn-primary" href="/admin/editberita/{{ $berita->id }}">Edit</a>
    <a class="btn btn-primary" href="/admin/deleteberita/{{ $berita->id }}">Delete</a>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
