<?php 
include '../../koneksi/koneksi.php';
$id_biodata = $_GET['id'];
$hapus = mysqli_query($koneksi,"DELETE FROM tbl_biodata WHERE id_biodata='$id_biodata'");
if (!$hapus) {
	echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Diahpus');window.location.href='../../media.php?conten=biodata'</script>";
}