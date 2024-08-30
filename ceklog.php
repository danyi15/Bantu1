<?php
session_start();

# check apakah ada akse post dari halaman login?, jika tidak kembali kehalaman depan
if( !isset($_POST['username']) ) { header('location:index.php'); exit(); }

# set nilai default dari error,
$error = '';

require ( 'koneksi.php' );

$username = trim( $_POST['username'] );
$password = trim( $_POST['password'] );


if( strlen($username) < 2 )
{
	# jika ada error dari kolom username yang kosong
	$error = "<script language='javascript'> alert('Username tidak boleh kosong'); </script>";
}else if( strlen($password) < 2 )
{
	# jika ada error dari kolom password yang kosong
	$error =  "<script language='javascript'> alert('Password tidak boleh kosong'); </script>";
}else{

	# Escape String, ubah semua karakter ke bentuk string
	$username = $koneksi->escape_string($username);
	$password = $koneksi->escape_string($password);


	# SQL command untuk memilih data berdasarkan parameter $username dan $password yang 
	# di inputkan
	$sql = "SELECT * FROM akun 
			WHERE mail='$username' 
			AND password='$password' LIMIT 1";

	# melakukan perintah
	$query = $koneksi->query($sql);

	# check query
	if( !$query )
	{
		die( 'Oops!! Database gagal '. $koneksi->error );
	}

	# check hasil perintah
	if( $query->num_rows == 1 )
	{	
		# jika data yang dimaksud ada
		# maka ditampilkan
		$row =$query->fetch_assoc();
		
		# data nama disimpan di session browser
		$_SESSION['user'] = $row['nama']; 
		$_SESSION['idkon'] = $row['mail']; 


		if( $row['mail'] == $username)
		{
		    header('location:uiuserlogin.php');
		exit();
			# data hak Admin di set
// 			$_SESSION['admin']= 'TRUE';
		}

		# menuju halaman sesuai hak akses
			$error = "<script language='javascript'> alert('Username atau password salah !'); </script>";

	}else{
		
		# jika data yang dimaksud tidak ada
		$error = "<script language='javascript'> alert('Username atau password salah !'); </script>";
	}

}

if( !empty($error) )
{
	# simpan error pada session
	$_SESSION['error'] = $error;
	header('location:uilogin.php?pesan=gagal');
	exit();
}
?>