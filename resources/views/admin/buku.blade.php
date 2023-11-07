<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Buku</title>
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

    <div class="container">
        <div class="row mt-3">
           <div class="col">
            <h2 class="text-secondary" style="color: yellow; font-weight: bold;">Selamat Datang {{ Auth::user()->name}}</h2>
        </div>
        </div><br><br>

        </div>
        <div class="container">
            <div class="row mt-3">
        <div class="col">
            <a class="btn btn-primary" type="button" value="Input"  href="{{ route('admin.tambahBuku') }}" style="text-decoration: none;">TAMBAH DATA</a>
        </div>
        <div class="col">
            <form action="{{ route('admin.buku') }}" method="GET">
                @csrf
                <div class="input-group mt-3">
                    <input type="search" name="search" class="form-control rounded" placeholder="Cari nama buku" aria-label="Search" aria-describedby="searchaddon" />
                    <button type="submit" class="btn btn-outline-primary">SEARCH</button>
                </div>
            </form>
        </div>
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
                <strong>Gagal!</strong> {{ Session::get('success') }}
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
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $buku)
                <tr>
                    <td scope="row">{{ $index + $data->firstItem() }}</td>
                    <td><img style="width: 50px" src="{{ asset('/images/' . $buku->gambar) }}" alt="cover buku"></td>
                    <td>{{ $buku->kode_buku }}</td>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->kategori }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>
    <a class="btn btn-primary" href="/admin/editbuku/{{ $buku->id }}">Edit</a>
    <a class="btn btn-primary" href="/admin/deletebuku/{{ $buku->id }}">Delete</a>
</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
        <br>
        {{ $data->links() }}
    </div>
    <br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>