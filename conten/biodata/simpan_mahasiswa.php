<?php
include "../../koneksi/koneksi.php";

$nim             = $_POST['nim'];
$nama            = $_POST['nama'];
$prodi           = $_POST['prodi'];
$semester        = $_POST['semester'];
$kelas           = $_POST['kelas'];
$jenis_kelamin   = $_POST['jenis_kelamin'];
$no_hp           = $_POST['no_hp'];
$email           = $_POST['email'];

$status = "Aktif";

//=========================
// Upload Foto
//=========================

$foto = "";

if($_FILES['foto']['name']!="")
{

    $namaFoto = time()."_".$_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "../../img/".$namaFoto
    );

    $foto = $namaFoto;

}

//=========================
// Simpan Database
//=========================

mysqli_query($koneksi,"INSERT INTO tbl_mahasiswa
(
nim,
nama,
prodi,
semester,
kelas,
jenis_kelamin,
no_hp,
email,
foto,
status
)
VALUES
(
'$nim',
'$nama',
'$prodi',
'$semester',
'$kelas',
'$jenis_kelamin',
'$no_hp',
'$email',
'$foto',
'$status'
)");

echo "<script>

alert('Data mahasiswa berhasil disimpan');

window.location='../../media.php?conten=biodata';

</script>";