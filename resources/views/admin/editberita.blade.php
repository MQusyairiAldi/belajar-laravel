
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Data berita</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis |
                D-IV Rakayasa Perangkat Lunak</a>
        </div>
    </nav>
    <div class="container">
        <a href="{{ route('admin.berita') }}">
            <i class="bi-arrow-left h1"></i>
        </a>
        <div class="container mt-3">
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Update Data Berita</h5>
                        <form action="/postEditberita/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Judul Berita</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="judul" required value="{{ $data->judul }}">
                                <span class="text-danger">
                                    @error('judul')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb2">Narasi Berita</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="narasi" required value="{{ $data->narasi }}">
                                <span class="text-danger">
                                    @error('narasi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tanggal Berita</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="tanggal" required value="{{ $data->tanggal }}">
                                <span class="text-danger">
                                    @error('tanggal')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Gambar</label>
                                <input class="form-control mb-2" placeholder="Nama file lama: {{ $data->gambar }}"
                                    disabled>
                                <input class="form-control" type="file" name="gambar">
                                <div class="form-text">Maksimal ukuran
                                    gambar cover berita 5MB</div>
                                <img class="mt-3" style="width: 100px" src="{{ asset('/images/' . $data->gambar) }}"
                                    alt="cover berita">
                            </div><br>
                            
                            <button type="submit" class="btn btn-success mt-5">Update Data Berita</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>

</html>