<?php
include '././koneksi/koneksi.php';

// ==============================
// Statistik
// ==============================

$totalMahasiswa = mysqli_num_rows(mysqli_query($koneksi,"
SELECT * FROM tbl_mahasiswa
"));

$totalRFID = mysqli_num_rows(mysqli_query($koneksi,"
SELECT * FROM tbl_mahasiswa
WHERE uid_rfid IS NOT NULL
AND uid_rfid<>''
"));

$hadirHariIni = mysqli_num_rows(mysqli_query($koneksi,"
SELECT *
FROM tbl_absensi
WHERE tanggal=CURDATE()
"));

$belumHadir = $totalMahasiswa - $hadirHariIni;

?>

<div class="alert alert-primary text-center">
    <h3>📝 RIWAYAT ABSENSI MAHASASISWA</h3>
</div>

<div class="row">

    <div class="col-md-3">

        <div class="card border-primary mb-3">

            <div class="card-header bg-primary text-white">

                👨‍🎓 Mahasiswa

            </div>

            <div class="card-body text-center">

                <h3><?php echo $totalMahasiswa; ?></h3>

                Total Mahasiswa

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-success mb-3">

            <div class="card-header bg-success text-white">

                📡 RFID

            </div>

            <div class="card-body text-center">

                <h3><?php echo $totalRFID; ?></h3>

                RFID Terdaftar

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-info mb-3">

            <div class="card-header bg-info text-white">

                ✅ Hadir

            </div>

            <div class="card-body text-center">

                <h3><?php echo $hadirHariIni; ?></h3>

                Hari Ini

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-danger mb-3">

            <div class="card-header bg-danger text-white">

                ❌ Belum Hadir

            </div>

            <div class="card-body text-center">

                <h3><?php echo $belumHadir; ?></h3>

            </div>

        </div>

    </div>

</div>

<div class="alert alert-success">

    <h5><b>📡 RFID Reader Status : CONNECTED</b></h5>

    Tempelkan kartu RFID pada alat absensi.

    <br>

    Data absensi akan langsung masuk ke database secara otomatis.

</div>

<table id="data" class="table table-striped table-bordered">

<thead class="thead-dark">

<tr>

<th>No</th>

<th>NIM</th>

<th>Nama Mahasiswa</th>

<th>UID RFID</th>

<th>Tanggal</th>

<th>Jam Masuk</th>

<th>Jam Keluar</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$data_absensi=mysqli_query($koneksi,"
SELECT
a.*,
m.nim,
m.nama
FROM tbl_absensi a
LEFT JOIN tbl_mahasiswa m
ON a.id_mahasiswa=m.id_mahasiswa
ORDER BY a.id_absensi DESC
");

while($row=mysqli_fetch_array($data_absensi))
{

?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $row['nim']; ?></td>

<td><?php echo $row['nama']; ?></td>

<td><?php echo $row['uid_rfid']; ?></td>

<td><?php echo $row['tanggal']; ?></td>

<td><?php echo $row['jam_masuk']; ?></td>

<td><?php echo $row['jam_keluar']; ?></td>

<td>

<?php

if($row['status']=="Hadir")
{

echo "<span class='badge badge-success'>Hadir</span>";

}
elseif($row['status']=="Izin")
{

echo "<span class='badge badge-warning'>Izin</span>";

}
elseif($row['status']=="Sakit")
{

echo "<span class='badge badge-info'>Sakit</span>";

}
else
{

echo "<span class='badge badge-danger'>Alpa</span>";

}

?>

</td>

</tr>

<?php

}

?>

</tbody>

</table>