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

    <title>Kehilangan</title>
  </head>

  <body>
     <body>
    <!-- Navbar -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Kehilangan</a>
          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </nav>
    <!-- Akhir Navbar -->

    <!-- JUMBOTRON -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p style="font-size: 19pt;"> Hai, Sobat Bantu </p> 
          <p style="font-size: 19pt;">Anda Kehilangan Apa?</p>
          <form action="" method="POST" enctype="multipart/form-data">
            <input class="form-control " type="text" name="barang" placeholder="Nama Barang" >
            <br> 
            <input class="form-control " type="text" name="lokasi" placeholder="Lokasi Kehilangan">
            <br>
            <!-- <input class="form-control " type="text" name="lokasi2" placeholder="Search" >
            <br> -->
            <input class="form-control " type="text" name="pemilik" placeholder="Nama Pelimik Barang" value="<?php echo $nama;?>">
            <br>
            <input class="form-control " type="text" name="kontak" placeholder="Kontak">
            <br>
            <input class="form-control " type="text" name="desk" placeholder="Deskripsi">
            <br>
            <p>Foto Barang</p>
            <input class="form-control " type="file" name="foto">
            <br>
            <button class="btn btn-primary" type="submit" name="upload">Upload</button>
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

$barang=$_POST['barang'];
$lokasi=$_POST['lokasi'];
$pemilik=$_POST['pemilik'];
$kontak=$_POST['kontak'];
$desk=$_POST['desk'];

$ekstensi_diperbolehkan = array('pdf','jpeg','png','jpg');
         $nama = $_FILES['foto']['name'];
         $x = explode('.', $nama);
         $ekstensi = strtolower(end($x));
         $ukuran  = $_FILES['foto']['size'];
         $file_tmp = $_FILES['foto']['tmp_name'];
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
     move_uploaded_file($file_tmp, 'img/barang/'.$nama);     
    $result = mysqli_query($koneksi, "INSERT INTO barang (barang,lokasi1,pemilik,kontak,desk,file,stt) VALUES('$barang','$lokasi','$pemilik','$kontak','$desk','$nama','Dicari')"); 
  if (!$result){
            echo "<script>alert('Gagal!');history.go(-1);</script>";
            }else{
               echo "<script>alert('Berhasil diupload!');window.location='index.php';</script>";

            }

}
}
?>
