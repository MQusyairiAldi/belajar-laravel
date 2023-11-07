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

<!-- Overview -->
<section id="overview" class="container mt-5">
    <h1 style="color: blue; font-weight: bold;">Input Data Dosen  </h1>
    <br><br>
</section>

<!-- Form Input Berita -->
<div class="container">
    <form action="proses_input_berita.php" method="post">
       
        <!-- Input Data Dosen -->
        <div class="form-floating">
            <input type="text" class="form-control" name="nama_dosen" id="floatingDosen" placeholder="Nama Dosen">
            <label for="floatingDosen">Nama Dosen</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="number" class="form-control" name="nip_dosen" id="floatingNIP" placeholder="NIP Dosen">
            <label for="floatingNIP">NIP Dosen</label>
        </div>
        <br>
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
                    </div><br>
                    <div class="mb-3">
            <label for="tanggalLahir" class="form-label">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tanggalLahir" required>
        </div>
        <br>
        <div class="form-floating">
            <input type="text" class="form-control" name="nip_dosen" id="floatingNIP" placeholder="Nomor HP">
            <label for="floatingNIP">Nomor Hp</label>
        </div>
        <br>

        <div class="mb-3">
            <label for="formFile" class="form-label">Masukkan Foto Dosen</label>
            <input class="form-control" type="file" name="foto_dosen" id="formFile">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Tambah Data Dosen</button>
    </form>
</div>

<!-- Memasukkan JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
