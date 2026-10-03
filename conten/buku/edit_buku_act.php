<?php 
include '../../koneksi/koneksi.php';
$id_buku = $_POST['id_buku'];
$id_rak = $_POST['id_rak'];
$id_penerbit = $_POST['id_penerbit'];
$kategori = $_POST['kategori'];
$nama_buku = $_POST['nama_buku'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$edit = mysqli_query($koneksi,"UPDATE tbl_buku SET id_rak='$id_rak',id_penerbit='$id_penerbit',kategori='$kategori',nama_buku='$nama_buku',harga='$harga',stok='$stok' WHERE id_buku='$id_buku'");
if (!$edit) {
	echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Diubah');window.location.href='../../media.php?conten=buku'</script>";
}