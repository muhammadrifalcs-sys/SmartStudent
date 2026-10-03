<?php
//Memulai Sesi Login
session_start();

//MENGAMBIL DATA KONEKSI
include 'koneksi/koneksi.php';

//Menerima Data Input
$username = $_POST['username'];
$password = md5($_POST['password']);

//Query mysql Cari Data User Berdasarkan Username Dan Password Yang Telah Diinput
$data = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'");

//Menghitung Hasil Cari User
$cek_data = mysqli_num_rows($data);

//Pengecekan Dan validasi
if ($cek_data > 0) {
	//Jika ada
	$_SESSION['login'] = "login";
	header("location:media.php?conten=home");
}else{
	//Jika Tidak Ada
	header("location:index.php?validasi=gagal");
}
?>