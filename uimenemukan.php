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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="menemukanstyle.css">
</head>

<body>
    <div class="inputbarang">
        <h1>INPUT BARANG DISINI</h1>
    </div>
    <div class="mane">
        <form action="" method="POST" enctype="multipart/form-data">
            <div id="nama">
                <h2 class="namabarang">Nama Barang</h2>
                <input class="text1" type="text" name="barang">
            </div>
            <div id="nama">
                <h2 class="lokasi">Lokasi Ditemukan</h2>
                <input class="text2" type="text" name="lokasi">
            </div>
            <div id="nama">
                <h2 class="lokasi2">Lokasi Barang Sekarang</h2>
                <input class="text3" type="text" name="lokasi2">
            </div>
            <div id="nama">
                <h2 class="penemu">Penemu</h2>
                <input class="text4" type="text" name="penemu" value="<?php echo $nama;?>">
            </div>
            <div id="nama">
                <h2 class="contact">Contact Person</h2>
                <input class="text5" type="text" name="kontak">
            </div>
            <div id="nama">
                <h2 class="deskripsi">Deskripsi (optional)</h2>
                <input class="text6" type="text" name="desk">
            </div>
            <div id="nama">
                <h2 class="foto">Foto Barang</h2>
                <label for="formFile" class="col-12 form-label"></label>
                <input class="form-control" type="file" name="foto">
            </div>
            <br>
            <button type="submit" class="submit" name="upload">Upload</button>
        </form>
    </div>
</body>

</html>

<?php
include 'koneksi.php';
if (isset($_POST["upload"])) {  

$barang=$_POST['barang'];
$lokasi=$_POST['lokasi'];
$lokasi2=$_POST['lokasi2'];
$pemilik=$_POST['penemu'];
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
        $result = mysqli_query($koneksi, "INSERT INTO barang (barang,lokasi1,lokasi2,penemu,kontak,desk,file,stt) VALUES('$barang','$lokasi','$lokasi2','$pemilik','$kontak','$desk','$nama','Ditemukan')"); 

  if (!$result){
            echo "<script>alert('Gagal!');history.go(-1);</script>";
            }else{
               echo "<script>alert('Berhasil diupload!');window.location='index.php?news=penemuan';</script>";

            }

}
}
?>