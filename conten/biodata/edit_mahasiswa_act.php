<?php
include "../../koneksi/koneksi.php";

$id = mysqli_real_escape_string($koneksi, $_POST['id_mahasiswa']);
$nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
$semester = mysqli_real_escape_string($koneksi, $_POST['semester']);
$kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);

$queryFoto = "";

if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ""){

    $namaFile = time()."_".basename($_FILES['foto']['name']);
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp,"../../upload/".$namaFile);

    $queryFoto = ", foto='$namaFile'";
}

$sql = "UPDATE tbl_mahasiswa SET
nim='$nim',
nama='$nama',
prodi='$prodi',
semester='$semester',
kelas='$kelas',
jenis_kelamin='$jenis_kelamin',
no_hp='$no_hp',
email='$email',
status='$status'";

if($queryFoto != ""){
    $sql .= $queryFoto;
}

$sql .= " WHERE id_mahasiswa='$id'";

$update = mysqli_query($koneksi,$sql);

if($update){

    echo "<script>

    alert('Data mahasiswa berhasil diperbarui');

    window.location='../../media.php?conten=biodata';

    </script>";

}else{

    echo "<script>

    alert('Gagal memperbarui data');

    history.back();

    </script>";

}
?>