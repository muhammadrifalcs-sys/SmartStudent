<?php
include "../../koneksi/koneksi.php";

if(isset($_GET['id']) && isset($_GET['uid'])){

    $id = mysqli_real_escape_string($koneksi,$_GET['id']);
    $uid = mysqli_real_escape_string($koneksi,$_GET['uid']);

    $sql = mysqli_query($koneksi,"
        UPDATE tbl_mahasiswa
        SET uid_rfid='$uid'
        WHERE id_mahasiswa='$id'
    ");

    if($sql){
        echo "BERHASIL";
    }else{
        echo "GAGAL";
    }

}else{

    echo "DATA TIDAK LENGKAP";

}
?>