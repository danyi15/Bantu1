<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- My Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" href="mencaristyle.css">

  <title>Mencari</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand text-primary fw-bold" href="#">Mencari</a>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- JUMBOTRON -->
  <div class="jumbotron jumbotron-fluid bg-primary text-white">
    <div class="container">
      <h5 class="mb-4">Hai, Sobat Bantu</h5> 
      <h4 class="fw-bold">Apa Yang Ingin Anda Cari?</h4>
      <form class="d-flex mt-4" role="search" action="cari.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Cari Nama Benda atau Lokasi ditemukan benda tsb" aria-label="Search" name="caribarang">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
 

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</body>
</html>
