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

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2 class="text-secondary" style="color: yellow; font-weight: bold;">Selamat Datang {{ Auth::user()->name }}</h2>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <a class="btn btn-primary" type="button" value="Input" href="{{ route('admin.tambah') }}" style="text-decoration: none;">TAMBAH DATA</a>
            </div>
            <div class="col">
                <form action="{{ route('admin.home') }}" method="GET">
                    @csrf
                    <div class="input-group mt-3">
                        <input type="search" name="search" class="form-control rounded" placeholder="Cari nama admin" aria-label="Search" aria-describedby="searchaddon" />
                        <button type="submit" class="btn btn-outline-primary">SEARCH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>GAGAL</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('admin.home') }}" method="GET">
                    @csrf
                    <!-- Isi form pencarian sesuai kebutuhan -->
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <div class="container">
        <table class="table table-primary table-striped" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $userAdmin)
                <tr>
                    <td>{{ $index + $data->firstItem() }}</td>
                    <td scope="row">{{ $userAdmin->name }}</td>
                    <td>{{ $userAdmin->email }}</td>
                    <td>{{ $userAdmin->jenis_kelamin }}</td>
                    <td>{{ $userAdmin->level }}</td>
                    <td>
                        <a type="button" class="btn btn-outline-primary" href="/editAdmin/{{ $userAdmin->id }}">EDIT</a>
                        <a type="button" class="btn btn-outline-primary" href="/deleteAdmin/{{ $userAdmin->id }}">DELETE</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <br><br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data Dosen</h5>
                        <p class="card-text">Anda bisa menginput data dosen.</p>
                        <a href="{{ route('admin.inputdosen') }}" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Berita</h5>
                        <p class="card-text">Anda bisa membuat berita baru</p>
                        <a href="{{ route('admin.inputberita') }}" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
