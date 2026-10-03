<?php
include '././koneksi/koneksi.php';
$no = 1;
?>

<div class="row">
    <div class="col-12">

        <div class="alert alert-primary">
            <center>
                <h3>🎓 DATA MAHASASISWA</h3>
            </center>
        </div>

    </div>
</div>

<div class="row mb-3">

    <div class="col-12">

        <a href="media.php?conten=tambah_mahasiswa" class="btn btn-success">

            ➕ Tambah Mahasiswa

        </a>

    </div>

</div>

<div class="row">

<div class="col-12">

<table id="data" class="table table-bordered table-striped">

<thead class="thead-dark">
<tr>

<th>No</th>
<th>Foto</th>
<th>NIM</th>
<th>Nama Mahasiswa</th>
<th>Program Studi</th>
<th>Semester</th>
<th>Kelas</th>
<th>UID RFID</th>
<th>Status</th>
<th>Aksi</th>

</tr>
</thead>
<tbody>

<?php

$data=mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa");

while($d=mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td>

<?php
if($d['foto']==""){
?>
<img src="desain/img/default.png" width="60">
<?php
}else{
?>
<img src="upload/<?= $d['foto']; ?>" width="60" height="60" style="border-radius:50%;">
<?php
}
?>

</td>

<td><?= $d['nim']; ?></td>

<td><?= $d['nama']; ?></td>

<td><?= $d['prodi']; ?></td>

<td><?= $d['semester']; ?></td>

<td><?= $d['kelas']; ?></td>

<td><?= $d['uid_rfid']; ?></td>

<td>

<?php
if($d['status']=="Aktif"){
?>
<span class="badge badge-success">Aktif</span>
<?php
}else{
?>
<span class="badge badge-danger">Nonaktif</span>
<?php
}
?>

</td>

<td>

<a href="media.php?conten=edit_mahasiswa&id=<?= $d['id_mahasiswa']; ?>"
class="btn btn-warning btn-sm">
✏ Edit
</a>

<a href="conten/biodata/hapus_mahasiswa.php?id=<?= $d['id_mahasiswa']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
🗑 Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>