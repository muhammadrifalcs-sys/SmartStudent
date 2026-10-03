<?php
include "../../koneksi/koneksi.php";

if (!isset($_GET['uid'])) {
    die("UID tidak diterima");
}

$uid = mysqli_real_escape_string($koneksi, $_GET['uid']);

// Cari mahasiswa berdasarkan UID
$cari = mysqli_query($koneksi,
"SELECT * FROM tbl_mahasiswa
WHERE uid_rfid='$uid'");

if(mysqli_num_rows($cari)==0){

    // Hapus UID lama
    mysqli_query($koneksi,"TRUNCATE TABLE tbl_rfid_temp");

    // Simpan UID terakhir
    mysqli_query($koneksi,"
    INSERT INTO tbl_rfid_temp(uid)
    VALUES('$uid')
    ");

    echo "KARTU_TIDAK_TERDAFTAR";
    exit;

}

$mhs = mysqli_fetch_assoc($cari);

$id = $mhs['id_mahasiswa'];

$tanggal = date("Y-m-d");
$jam = date("H:i:s");

// Cek absensi hari ini
$cek = mysqli_query($koneksi,"
SELECT *
FROM tbl_absensi
WHERE id_mahasiswa='$id'
AND tanggal='$tanggal'
");

if(mysqli_num_rows($cek)==0){

    // Belum pernah absen hari ini
    mysqli_query($koneksi,"
    INSERT INTO tbl_absensi
    (
        id_mahasiswa,
        uid_rfid,
        tanggal,
        jam_masuk,
        status
    )
    VALUES
    (
        '$id',
        '$uid',
        '$tanggal',
        '$jam',
        'Hadir'
    )");

    echo "ABSEN_MASUK|".$mhs['nama'];

}else{

    $data = mysqli_fetch_assoc($cek);

    if(empty($data['jam_keluar'])){

        // Isi jam pulang
        mysqli_query($koneksi,"
        UPDATE tbl_absensi
        SET jam_keluar='$jam'
        WHERE id_absensi='".$data['id_absensi']."'
        ");

        echo "ABSEN_PULANG|".$mhs['nama'];
    }else{

        // Sudah absen masuk dan pulang
        echo "SUDAH_ABSEN|".$mhs['nama'];

    }

}

?>