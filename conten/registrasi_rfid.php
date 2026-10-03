<?php
include "./koneksi/koneksi.php";

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID Mahasiswa tidak ditemukan.</div>";
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE id_mahasiswa='$id'");

if (mysqli_num_rows($data) == 0) {
    echo "<div class='alert alert-danger'>Data mahasiswa tidak ditemukan.</div>";
    exit;
}

$mhs = mysqli_fetch_assoc($data);
?>

<div class="container">

    <div class="alert alert-primary">
        <h3 align="center">📡 Registrasi RFID Mahasiswa</h3>
    </div>

    <table class="table table-bordered">

        <tr>
            <th width="30%">NIM</th>
            <td><?= $mhs['nim']; ?></td>
        </tr>

        <tr>
            <th>Nama</th>
            <td><?= $mhs['nama']; ?></td>
        </tr>

        <tr>
            <th>Program Studi</th>
            <td><?= $mhs['prodi']; ?></td>
        </tr>

        <tr>
            <th>Kelas</th>
            <td><?= $mhs['kelas']; ?></td>
        </tr>

        <tr>
            <th>UID RFID</th>
            <td>

            <?php

            if($mhs['uid_rfid']==""){

                echo "<span class='text-danger'>Belum Terdaftar</span>";

            }else{

                echo $mhs['uid_rfid'];

            }

            ?>

            </td>
        </tr>

    </table>

    <div class="alert alert-warning text-center">

        <h4>📡 Silakan Tempelkan Kartu RFID...</h4>

        <p>ESP32 akan mengirim UID ke API.</p>

    </div>
<hr>

<div class="alert alert-success">

    <h5>UID Terbaca :</h5>

    <h3 id="uidTerbaru">
        Menunggu kartu...
    </h3>

</div>

<button
id="btnSimpan"
class="btn btn-success"
style="display:none;"
onclick="simpanRFID()">
💾 Simpan RFID
</button>
    <a href="media.php?conten=anggota" class="btn btn-secondary">
        ← Kembali
    </a>

</div>
<script>

function simpanRFID(){

    fetch("conten/api/register_rfid.php?id=<?= $id ?>&uid=" + uidTerakhir)

    .then(response => response.text())

    .then(function(res){

    res = res.trim();

    if(res=="BERHASIL"){

        alert("✅ RFID berhasil didaftarkan");

        location.href="media.php?conten=anggota";

    }

    else if(res=="SUDAH_DIPAKAI"){

        alert("⚠ RFID sudah digunakan oleh mahasiswa lain.");

    }

    else{

        alert(res);

    }

});

}
let uidTerakhir = "";
let uidSebelumnya = "";

function loadUID(){

    fetch("conten/api/get_uid.php?t=" + new Date().getTime())
    .then(response => response.text())
    .then(function(uid){

        uid = uid.trim();

        if(uid !== "" && uid !== uidSebelumnya){

            uidSebelumnya = uid;
            uidTerakhir = uid;

            document.getElementById("uidTerbaru").innerHTML = uid;
            document.getElementById("btnSimpan").style.display = "inline-block";

        }

        if(uid === ""){

            document.getElementById("uidTerbaru").innerHTML = "Menunggu kartu...";
            document.getElementById("btnSimpan").style.display = "none";

            uidTerakhir = "";
            uidSebelumnya = "";
        }

    })
    .catch(function(error){

        console.log(error);

    });

}

setInterval(loadUID,500);

loadUID();
</script>