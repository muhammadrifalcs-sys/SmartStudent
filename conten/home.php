<?php
include "./koneksi/koneksi.php";

$tgl = date("Y-m-d");

// Total mahasiswa
$qMahasiswa = mysqli_query($koneksi,"SELECT COUNT(*) AS total FROM tbl_mahasiswa");
$totalMahasiswa = mysqli_fetch_assoc($qMahasiswa)['total'];

// RFID terdaftar
$qRFID = mysqli_query($koneksi,"
SELECT COUNT(*) AS total
FROM tbl_mahasiswa
WHERE uid_rfid IS NOT NULL
AND uid_rfid <> ''
");
$totalRFID = mysqli_fetch_assoc($qRFID)['total'];

// Hadir hari ini
$qHadir = mysqli_query($koneksi,"
SELECT COUNT(*) AS total
FROM tbl_absensi
WHERE tanggal='$tgl'
");
$totalHadir = mysqli_fetch_assoc($qHadir)['total'];

$totalBelumHadir = $totalMahasiswa - $totalHadir;
?>

<div class="alert alert-success text-center">
    <h3>🎓 SMART STUDENT</h3>
    <h5>Sistem Absensi Mahasiswa Berbasis RFID RDM6300 dan ESP32</h5>
</div>

<div class="row">

    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white">
                👨‍🎓 Data Mahasiswa
            </div>
            <div class="card-body">
                <h3 align="center"><?php echo $totalMahasiswa; ?></h3>
                <p align="center">
                    Total Mahasiswa
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-success mb-3">
            <div class="card-header bg-success text-white">
                📡 RFID
            </div>
            <div class="card-body">
                <h3 align="center"><?php echo $totalRFID; ?></h3>
                <p align="center">
                    Kartu Terdaftar
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white">
                ✅ Absensi Hari Ini
            </div>
            <div class="card-body">
                <h3 align="center"><?php echo $totalHadir; ?></h3>
                <p align="center">
                    Mahasiswa Hadir
                </p>
            </div>
        </div>
    </div>
<div class="col-md-3">
    <div class="card border-warning mb-3">

        <div class="card-header bg-warning text-dark">
            ❌ Belum Hadir
        </div>

        <div class="card-body">

            <h3 align="center">
                <?php echo $totalBelumHadir; ?>
            </h3>

            <p align="center">
                Mahasiswa Belum Absen
            </p>

        </div>

    </div>
</div>
</div>

🟢 STATUS SISTEM

📡 RFID Reader : Connected

🌐 Database : Connected

📶 WiFi ESP32 : Connected

🖥 Server : Running

📅 Tanggal : 11 Juli 2026

🕒 Jam : 11:30:25 WIB

<hr>

<h4>📋 5 Absensi Terakhir</h4>

<table class="table table-bordered table-striped">

<thead class="thead-dark">

<tr>

<th>Nama</th>
<th>Tanggal</th>
<th>Masuk</th>
<th>Pulang</th>

</tr>

</thead>

<tbody>

<?php

$data=mysqli_query($koneksi,"
SELECT
m.nama,
a.tanggal,
a.jam_masuk,
a.jam_keluar
FROM tbl_absensi a
LEFT JOIN tbl_mahasiswa m
ON a.id_mahasiswa=m.id_mahasiswa
ORDER BY a.id_absensi DESC
LIMIT 5
");

if(!$data){
    die(mysqli_error($koneksi));
}

while($d=mysqli_fetch_array($data))
{

?>

<tr>

<td><?php echo $d['nama']; ?></td>

<td><?php echo $d['tanggal']; ?></td>

<td><?php echo $d['jam_masuk']; ?></td>

<td><?php echo $d['jam_keluar']; ?></td>

</tr>

<?php

}

?>

</tbody>

</table>