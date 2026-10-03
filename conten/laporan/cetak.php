<?php
include '../../koneksi/koneksi.php';
include '../../koneksi/fungsi_tanggal.php';

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];
$status = $_GET['status'];
?>

<script type="text/javascript">
    window.print();
</script>

<h1><center>LAPORAN</center></h1>
<hr>

<?php
if ($status == "1") {
    include 'dipinjam.php';
} elseif ($status == "2") {
    include 'selesai.php';
} else {
    include 'semua.php';
}
?>
