
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Data Dosen</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis |
                D-IV Rakayasa Perangkat Lunak</a>
        </div>
    </nav>
    <div class="container">
        <a href="{{ route('admin.dosen') }}">
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
                        <h5 class="card-title text-center">Update Data Dosen</h5>
                        <form action="/postEditdosen/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">ID Dosen</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="id_dosen" required value="{{ $data->id_dosen }}">
                                <span class="text-danger">
                                    @error('id_dosen')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Nama</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="nama" required value="{{ $data->nama }}">
                                <span class="text-danger">
                                    @error('nama')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb2">Jurusan</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="jurusan" required value="{{ $data->jurusan }}">
                                <span class="text-danger">
                                    @error('jurusan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tanggal Lahir</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="tanggal_lahir" required value="{{ $data->tanggal_lahir }}">
                                <span class="text-danger">
                                    @error('tanggal_lahir')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb2">No Hp</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="no_hp" required value="{{ $data->no_hp }}">
                                <span class="text-danger">
                                    @error('no_hp')
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
                                    gambar cover buku 5MB</div>
                                <img class="mt-3" style="width: 100px" src="{{ asset('/images/' . $data->gambar) }}"
                                    alt="cover buku">
                            </div><br>
                            
                            <button type="submit" class="btn btn-success mt-5">Update Data Buku</button>
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