
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
                                                                       
       }                                                                 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />

    <!-- My css -->
    <link rel="stylesheet" href="ui1style.css" />

    <title>Bantu</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">BANTU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="uimencari.php">Mencari</a>
            <a class="nav-item nav-link" href="uimenemukan.php">Menemukan</a>
            <a class="nav-item nav-link" href="https://umrah.ac.id/profil">About</a>
            <?php
            if (empty($nama)) {
              echo'<a class="nav-item btn btn-primary tombol" href="uilogin.php"> Login</a>';

            }else{
              echo'
              <a class="nav-item nav-link" href="uikehilangan.php">Upload Kehilangan</a>
              <a class="nav-item btn btn-primary tombol" href="uiuserlogin.php">'.$nama.'</a>
              <a class="nav-item btn btn-danger tombol" href="logout.php"> Logout</a>';
            }
            ?>
            
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- JUMBOTRON -->
   <!--  <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"><span> Welcome To </span> <span>Bantu</span></h1>
        <a href="" class="btn btn-primary btn-lg tombol">Temukan Barang Disini</a>
      </div>
    </div> -->

    <!-- AKHIR JUMBOTRON -->

    <!-- CONTAINER -->
    <br><br><br><br><br><br><br>
    <?php
@$news=$_GET['jns'];
if ($news=='penemuan') {
  
  $berita="Detail Barang";
  
}else{
  $berita="Detail Barang Hilang";
  
}
?>
    <div class="container">
      <!-- INFO PANEL -->
      <div class="row justify-content-center ">
        <div class="col-10 info-panel bg-primary">
          <div class="row">
            <div class="col-lg ">
              <h1><?php echo $berita;?></h1>
              <!-- <p>Silahkan Login Untuk Menambahkan Informasi</p> -->
            </div>
          </div>
        </div>
      </div>
      <!-- AKHIR INFO PANEL -->
 
      <!-- WorkingSpace -->
      <?php
      $idbarang=$_GET['idbarang'];

      $result = mysqli_query($koneksi, "SELECT * FROM barang where id='$idbarang' ");
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
      <h4><span>Nama Barang:</span></h4>
      <h><span><?php echo $barang;?></h6>
      
       <?php

if ($news=='penemuan') {
  
 
  echo "
<h4><span>Lokasi Penemuan:</span></h4>
      <h6><span>$lokasi1</h6>
<h4><span>Lokasi Sekarang:</span></h4>
      <h6><span>$lokasi2</h6>
  <h4><span>Penemu</span></h4>
      <h6><span>$penemu</h6>";
}else{
  echo "
<h4><span>Lokasi Kehilangan:</span></h4>
      <h6><span>$lokasi1</h6>
  <h4><span>Pemilik</span></h4>
      <h6><span>$pemilik</h6>";
  
}
?>
      
      <h4><span>Contact Person</span></h4>
      <h6><span><?php echo $kontak;?></h6>
      <h4><span>Deskripsi (Optional)</span></h4>
      <h6><span><?php echo $desk;?></h6>
<?php 
if ($news=='penemuan') {
  

  
}else{
 
  ?>
  <a href="ditemukan.php?idbarang=<?php echo $id;?>" class="btn btn-primary">Saya Menemukanya</a>
  <?php
}
?>
      
        </div>
      </div>
      <?php 
    }
    ?>
     <!--  <div class="row workingspace">
        <div class="col-lg">
          <img src="img/MOTOR.jpg" alt="motor" class="img-fluid" />
        </div>
        <div class="col">
          <h3><span>Dicari</span></h3>
          <h5><span>Dicari Sebuah motor beat warna merah.</span>Untuk keterangan lebih lengkap dapat mengklik tombol dibawah ini</h5>
          <a href="uidetail.html" class="btn btn-primary btn-lg tombol">Detail</a>
        </div>
      </div> -->

      <!-- AkhirworkingSpace -->

      <!-- FOOTER -->
      <div class="row footer">
        <div class="col text-center">
          <p>2022 All Rights Reversed by Danyi Aprizal</p>
          <p>Designed Sandhiga</p>
        </div>
      </div>
      <!-- AKHIR FOOTER -->
    </div>
    <!-- AKHIR CONTAINER -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
