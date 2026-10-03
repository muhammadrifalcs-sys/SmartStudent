<?php
include '../../koneksi/koneksi.php';
$nama_lengkap = $_POST['nama_lengkap'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$hobi = $_POST['hobi'];
$agama = $_POST['agama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$edit = mysqli_query($koneksi,"UPDATE tbl_biodata SET 
	nama_lengkap='$nama_lengkap',
	hobi = '$hobi',
	jenis_kelamin='$jenis_kelamin',
	email='$email',
	no_telp='$no_telp',
	agama='$agama',
	alamat='$alamat'
	WHERE nama_lengkap='$nama_lengkap'");
if (!$edit) {
	echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Diedit');window.location.href='../../media.php?conten=biodata'</script>";
}