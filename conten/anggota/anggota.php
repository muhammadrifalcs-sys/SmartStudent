<?php
include './koneksi/koneksi.php';
$no = 1;
?>

<div class="row">
    <div class="col-12">
        <div class="alert alert-primary">
            <center>
                <h3>📡 REGISTRASI RFID MAHASASISWA</h3>
                <small>Daftarkan kartu RFID ke setiap mahasiswa</small>
            </center>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
   <a href="media.php?conten=registrasi_rfid" class="btn btn-success">
    🔄 Refresh Data
</a>
    </div>
</div>

<div class="row">
<div class="col-12">

<table id="data" class="table table-bordered table-striped">

<thead class="thead-dark">

<tr>

<th>No</th>
<th>NIM</th>
<th>Nama Mahasiswa</th>
<th>Program Studi</th>
<th>Kelas</th>
<th>UID RFID</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$data = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa");

while($d = mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nim']; ?></td>

<td><?= $d['nama']; ?></td>

<td><?= $d['prodi']; ?></td>

<td><?= $d['kelas']; ?></td>

<td>

<?php

if($d['uid_rfid']==""){

echo "<span class='text-danger'>Belum Terdaftar</span>";

}else{

echo $d['uid_rfid'];

}

?>

</td>

<td>
<?php
if($d['uid_rfid']==""){
    echo "<span class='badge badge-danger'>Belum Terdaftar</span>";
}else{
    echo "<span class='badge badge-success'>Terdaftar</span>";
}
?>
</td>
<td>

<a href="media.php?conten=registrasi_rfid&id=<?php echo $d['id_mahasiswa']; ?>"
class="btn btn-primary btn-sm">

📡 Daftarkan RFID

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>