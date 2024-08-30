<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration or Sign</title>
    <link rel="stylesheet" href="registerstyle.css" />
  </head>
  <body>
    <div class="wrapper">
      <h2>Registration</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-box">
          <input type="text" placeholder="Enter your name" name="nama" required />
        </div>
        <div class="input-box">
          <input type="mail" placeholder="Enter your email" name="mail" required />
        </div>
        <div class="input-box">
          <input type="text" placeholder="jurusan" name="jurusan" required list="jrn" />
          <datalist id="jrn" >
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Perkapalan">Teknik Perkapalan</option>
          </datalist>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Create password" name="password"  minlength="8" maxlength="12" required />
        </div>
        <div class="input-box">
          <input type="password" placeholder="Confirm password" name="password2" minlength="8" maxlength="12" required />
        </div>
        <div class="input-box">
          <input type="file"  name="foto" required />
        </div>
        <div class="policy">
          <input type="checkbox" required/>
          <h3>I accept all terms & condition</h3>
        </div>
        <div class="input-box button">
          <input type="Submit" value="Register Now" name="daftar" />
        </div>
        <div class="text">
          <h3>Already have an account? <a href="uilogin.php">Login now</a></h3>
        </div>
      </form>
    </div>
  </body>
</html>

<?php
include 'koneksi.php';
if (isset($_POST["daftar"])) {  

$nama=$_POST['nama'];
$mail=$_POST['mail'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$jurusan=$_POST['jurusan'];

$ekstensi_diperbolehkan = array('pdf','jpeg','png','jpg');
         $namafoto = $_FILES['foto']['name'];
         $x = explode('.', $namafoto);
         $ekstensi = strtolower(end($x));
         $ukuran  = $_FILES['foto']['size'];
         $file_tmp = $_FILES['foto']['tmp_name'];
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

          
if ($password2==$password) {
  move_uploaded_file($file_tmp, 'img/profil/'.$namafoto);   
  $result = mysqli_query($koneksi, "INSERT INTO akun (nama,mail,password,foto,jurusan) VALUES('$nama','$mail','$password','$namafoto','$jurusan')"); 
  if (!$result){
            echo "<script>alert('Gagal!');history.go(-1);</script>";
            }else{
               echo "<script>alert('Berhasil Daftar!');window.location='uilogin.php';</script>";

            }

}else{
  echo "<script>alert('Password Tidak Sama!');history.go(-1);</script>";
   }



}

}
?>
