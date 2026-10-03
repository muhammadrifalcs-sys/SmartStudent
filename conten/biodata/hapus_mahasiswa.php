<?php
include "../../koneksi/koneksi.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Ambil nama foto terlebih dahulu
    $data = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa WHERE id_mahasiswa='$id'");
    $d = mysqli_fetch_assoc($data);

    // Hapus file foto jika ada
    if(!empty($d['foto']) && file_exists("../../upload/".$d['foto'])){
        unlink("../../upload/".$d['foto']);
    }

    // Hapus data mahasiswa
    mysqli_query($koneksi,"DELETE FROM tbl_mahasiswa WHERE id_mahasiswa='$id'");

    echo "<script>
        alert('Data mahasiswa berhasil dihapus');
        window.location='../../media.php?conten=biodata';
    </script>";

}else{

    header("Location: ../../media.php?conten=biodata");

}
?>