<?php
include '././koneksi/koneksi.php';
include '././koneksi/fungsi_tanggal.php';
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
$status = $_POST['status'];
$no = 1;
?>
<style type="text/css">
    .tombol_cetak {
        text-decoration: none;
        background-color: lightblue;
        padding: 5px;
        border: 2px solid black;
        border-radius: 10px;
        color: black;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="alert alert-primary" role="alert">
            <h4 style="text align: center">Laporan Dari Tanggal <?php echo tgl_tampil($dari)." Sampai ".tgl_tampil($sampai)?></h4>
        </div>
    </div>
</div>
<hr>
<div style="text align: right;">
    <a class="btn btn-dark" href="conten/laporan/cetak.php?dari=<?php echo $dari?>&sampai=<?php echo $sampai?>&status=<?php echo $status?>" target="_blank" class="tombol_cetak">Cetak Data</a>
</div>
<br>
<?php
if ($status=="1") {
    $data_laporan = mysqli_query($koneksi,"SELECT * FROM tbl_pinjaman P, tbl_buku B, tbl_anggota A WHERE P.id_buku = B.id_buku AND P.id_anggota = A.id_anggota AND tanggal_pinjam>='$dari' AND tanggal_pinjam<='$sampai' AND status_pinjaman='0'");
} elseif ($status=="2") {
    $data_laporan = mysqli_query($koneksi,"SELECT * FROM tbl_pinjaman P, tbl_pengembalian N, tbl_buku B, tbl_anggota A WHERE N.id_pinjaman = P.id_pinjaman AND P.id_buku = B.id_buku AND P.id_anggota = A.id_anggota AND tanggal_pinjam>='$dari' AND tanggal_pinjam<='$sampai'");
} else {
    $data_laporan = mysqli_query($koneksi,"SELECT * FROM tbl_pinjaman P, tbl_buku B, tbl_anggota A WHERE P.id_buku = B.id_buku AND P.id_anggota = A.id_anggota AND tanggal_pinjam>='$dari' AND tanggal_pinjam<='$sampai'");
}
?>
<div class="row">
    <div class="col-12">
        <table id="data" class="table table-striped table-bordered" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th bgcolor="cyan">No</th>
                    <th bgcolor="cyan">Nama Anggota</th>
                    <th bgcolor="cyan">Nama Buku</th>
                    <th bgcolor="cyan">Tanggal Pinjam</th>
                    <th bgcolor="cyan">Tanggal Kembali</th>
                    <th bgcolor="cyan">Status</th>
                </tr>
            </thead>
        <?php
        while ($row = mysqli_fetch_array($data_laporan)) {
            ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['nama_anggota']?></td>
                <td><?php echo $row['nama_buku']?></td>
                <td><?php echo tgl_tampil($row['tanggal_pinjam'])?></td>
                <td><?php echo tgl_tampil($row['tanggal_kembali'])?></td>
                <td>
                    <?php if ($row['status_pinjaman']=='1') {
                        echo "SELESAI";
                    } else {
                        echo "MASIH DIPINJAM";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
        </table>
    </div>
</div>