<?php
include '../../koneksi/koneksi.php';
$nama_anggota = $_POST['nama_anggota'];
$no_telp_anggota = $_POST['no_telp_anggota'];
$email_anggota = $_POST['email_anggota'];
$alamat_anggota = $_POST['alamat_anggota'];

$simpan = mysqli_query($koneksi,"INSERT INTO tbl_anggota (nama_anggota,no_telp_anggota,email_anggota, alamat_anggota) 
VALUES ('$nama_anggota','$no_telp_anggota','$email_anggota','$alamat_anggota')");

if (!$simpan) {
    echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
    echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?conten=anggota'</script>";
}
?>
