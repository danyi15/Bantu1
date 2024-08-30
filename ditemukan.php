<?php
session_start();
  
if( !isset($_SESSION['user']) )
{
  header('location:uilogin.php');
  exit();
}

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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />

    <!-- My Css -->
    <link rel="stylesheet" href="mencaristyle.css">

    <title>Ditemukan</title>
  </head>

  <body>
     <body>
    <!-- Navbar -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Ditemukan</a>
          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </nav>
    <!-- Akhir Navbar -->
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
                                                                       
       }

      ?>
    <!-- JUMBOTRON -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <!-- <p style="font-size: 19pt;"> Hai, Sobat Bantu </p>  -->
          <p style="font-size: 19pt;">Wahh Anda Menemukan Sesuatu</p>
          <img src="img/barang/<?php echo $file;?>" alt="Dompet" class="img-fluid" width="200"/>
          <br><br>
          <form action="" method="POST" enctype="multipart/form-data">
            <input class="form-control " type="text" name="idbarang" placeholder="Deskripsi" value="<?php echo $id;?>" hidden>
            <input class="form-control " type="text" name="pemilik" placeholder="Nama Penemu Barang" value="<?php echo $nama;?>">
            <br>
            <input class="form-control " type="text" name="lokasi" placeholder="Lokasi Ditemukan">
            <br>
            <input class="form-control " type="text" name="kontak" placeholder="Kontak Penemu">
            <br>
            <input class="form-control " type="text" name="desk" placeholder="Deskripsi">
            <br>
            
            <button class="btn btn-primary" type="submit" name="upload">Ditemukan</button>
          </form>
          
        </div>
      </div>
  
      <!-- AKHIR JUMBOTRON -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


<?php
include 'koneksi.php';
if (isset($_POST["upload"])) {  

$idbarang=$_POST['idbarang'];
$lokasi=$_POST['lokasi'];
$pemilik=$_POST['pemilik'];
$kontak=$_POST['kontak'];
$desk=$_POST['desk'];


  
    $result = mysqli_query($koneksi, "UPDATE barang SET kontak2='$kontak',ket='$desk',penemu='$pemilik',lokasi2='$lokasi',stt='Ditemukan' WHERE id='$idbarang'"); 
  if (!$result){
            echo "<script>alert('Gagal!');history.go(-1);</script>";
            }else{
               echo "<script>alert('Berhasil diupload!');window.location='index.php';</script>";

            }


}
?>
