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
    <h1 style="color: ; font-weight: bold;">Input Berita </h1>
   <br><br>
</section>

<!-- Courses -->
<div class="container">
<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Judul Berita</label>
</div><br>
<div>
<div class="form-floating">
    
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
    <label for="floatingTextarea2">Narasi Berita</label>
  </div>
</div>
<br>

<div class="mb-3">
  <label for="formFile" class="form-label">Masukan Foto Berita</label>
  <input class="form-control" type="file" id="formFile">
</div><br>

<button type="button" class="btn btn-outline-primary">Simpan</button>
</div>




<!-- Memasukkan JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
