<?php
include '../../koneksi/koneksi.php';
$nama_lengkap = $_POST['nama_lengkap'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$hobi = $_POST['hobi'];
$agama = $_POST['agama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$simpan = mysqli_query($koneksi,"INSERT INTO tbl_biodata(nama_lengkap,hobi,jenis_kelamin,email,no_telp,agama,alamat) VALUES('$nama_lengkap','$hobi','$jenis_kelamin','$email','$no_telp','$agama','$alamat')");
if (!$simpan) {
	echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?conten=biodata'</script>";
}