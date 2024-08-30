<?php
session_start();
  


$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
$mail = ( isset($_SESSION['idkon']) ) ? $_SESSION['idkon'] : '';
?>
<?php 
 include 'koneksi.php';

                                                                      
  $result = mysqli_query($koneksi, "SELECT * FROM akun where mail='$mail' ");
      while($user_data = mysqli_fetch_array($result)) {
          $id = $user_data['id'];
          $nama=$user_data['nama'];
          $email=$user_data['mail'];
          $password=$user_data['password'];
          $jurusan=$user_data['jurusan'];
          $foto=$user_data['foto'];
                                                                       
       }                                                                 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- boostrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

     <!-- My Font -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />
    
    <!--My CSS-->
    <link rel="stylesheet" href="uiserlogin.css">
    
    <title>Bantu Login| DanyiA</title>
  </head>
  <id="home">
    <!-- Navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="uiutama.html">Bantu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#prestasi">Achievement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#Contact">Contact</a>
            </li> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar-->

<!--Jumbotron-->
<section class="jumbotron text-center">
  <img src="img/profil/<?php echo $foto;?>" alt="Danyi Aprizal" width="200"
  class="rounded-circle img-thumbnail"/>
  <h1 class="display-6"><?php echo $nama;?></h1>
  <p class="lead"> <?php echo $jurusan;?></p>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,101.3C384,107,480,149,576,186.7C672,224,768,256,864,245.3C960,235,1056,181,1152,160C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
 </section>
<!-- AkhirJumbotron-->
<!-- prestasi-->
<section id="prestasi">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="kol">
        <h2>BERITA HARI INI </h2>
      </div>
    </div>
     <?php

      $result = mysqli_query($koneksi, "SELECT * FROM barang where pemilik='$nama' or penemu='$nama'");
      while($user_data = mysqli_fetch_array($result)) {
          $id = $user_data['id'];
          $barang=$user_data['barang'];
          $lokasi1=$user_data['lokasi1'];
          $lokasi2=$user_data['lokasi2'];
          $pemilik=$user_data['pemilik'];
          $penemu=$user_data['penemu'];
          $kontak=$user_data['kontak'];
          $kontak2=$user_data['kontak2'];
          $desk=$user_data['desk'];
          $file=$user_data['file'];
          $stt=$user_data['stt'];
                                                                       
       

      ?>
      <div class="row workingspace">
        <div class="col-lg">
          <img src="img/barang/<?php echo $file;?>" alt="Dompet" class="img-fluid" width="400"/>
        </div>
        <div class="col">
          <h3><span><?php echo $stt;?></span></h3>
          <h5><span><?php echo $barang;?>,</span> Untuk keterangan lebih lengkap dapat mengklik tombol dibawah ini</h5>
          <a href="uidetail.php?idbarang=<?php echo $id;?>&jns=<?php echo $news;?>" class="btn btn-primary btn-lg tombol">Detail</a>
        </div>
      </div>
      <?php 
    }
    ?>
    <!-- <div class="row">
      <div class="col-md-6 mb-3">
        <div class="card" >
          <img src="img/DOMPET.jpg" class="card-img-top" alt="prestasi1">
          <div class="card-body">
            <p class="card-text">Ditemukan Sebuah dompet warna coklat.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="card">
          <img src="img/MOTOR.jpg" class="card-img-top" alt="prestasi2">
          <div class="card-body">
            <p class="card-text">Dicari Sebuah motor beat warna merah.</p>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,64L30,96C60,128,120,192,180,197.3C240,203,300,149,360,138.7C420,128,480,160,540,186.7C600,213,660,235,720,250.7C780,267,840,277,900,245.3C960,213,1020,139,1080,128C1140,117,1200,171,1260,208C1320,245,1380,267,1410,277.3L1440,288L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</section>

<!-- akhir prestasi-->

<!-- Footer-->
<footer class="bg-primary tex-white text-center pb-5">
  <p> Created With <i class="bi bi-heart-fill"></i> By <a href="https://www.youtube.com/channel/UCNPngjHgVAQ5nVYcTh15IsQ" class="text-white fw-bold">DanyiAprizal</a></p>
</footer>

<!-- Akhir Footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
