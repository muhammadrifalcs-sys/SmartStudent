<?php
include "./koneksi/koneksi.php";

if (!isset($_GET['id'])) {
    echo "<script>
            alert('Data tidak ditemukan!');
            window.location='media.php?conten=biodata';
          </script>";
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$data = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE id_mahasiswa='$id'");

if (mysqli_num_rows($data) == 0) {
    echo "<script>
            alert('Mahasiswa tidak ditemukan!');
            window.location='media.php?conten=biodata';
          </script>";
    exit;
}

$d = mysqli_fetch_assoc($data);
?>

<div class="container">

<div class="card">

<div class="card-header bg-warning text-dark">

<h4>✏ Edit Mahasiswa</h4>

</div>

<div class="card-body">

<form action="conten/biodata/edit_mahasiswa_act.php"
method="POST"
enctype="multipart/form-data">

<input type="hidden"
name="id_mahasiswa"
value="<?= $d['id_mahasiswa']; ?>">

<div class="form-group">

<label>NIM</label>

<input
type="text"
name="nim"
class="form-control"
value="<?= htmlspecialchars($d['nim']); ?>"
required>

</div>

<div class="form-group">

<label>Nama Mahasiswa</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= htmlspecialchars($d['nama']); ?>"
required>

</div>

<div class="form-group">

<label>Program Studi</label>

<input
type="text"
name="prodi"
class="form-control"
value="<?= htmlspecialchars($d['prodi']); ?>"
required>

</div>

<div class="form-group">

<label>Semester</label>

<input
type="text"
name="semester"
class="form-control"
value="<?= htmlspecialchars($d['semester']); ?>"
required>

</div>

<div class="form-group">

<label>Kelas</label>

<input
type="text"
name="kelas"
class="form-control"
value="<?= htmlspecialchars($d['kelas']); ?>">

</div>

<div class="form-group">

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
class="form-control">

<option value="Laki-laki" <?= ($d['jenis_kelamin']=="Laki-laki")?"selected":""; ?>>
Laki-laki
</option>

<option value="Perempuan" <?= ($d['jenis_kelamin']=="Perempuan")?"selected":""; ?>>
Perempuan
</option>

</select>

</div>

<div class="form-group">

<label>No HP</label>

<input
type="text"
name="no_hp"
class="form-control"
value="<?= htmlspecialchars($d['no_hp']); ?>">

</div>

<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($d['email']); ?>">

</div>

<div class="form-group">

<label>Status</label>

<select
name="status"
class="form-control">

<option value="Aktif" <?= ($d['status']=="Aktif")?"selected":""; ?>>
Aktif
</option>

<option value="Nonaktif" <?= ($d['status']=="Nonaktif")?"selected":""; ?>>
Nonaktif
</option>

</select>

</div>

<div class="form-group">

<label>Foto Baru (Opsional)</label>

<input
type="file"
name="foto"
class="form-control">

</div>

<?php
if($d['foto']!=""){
?>

<br>

<img
src="upload/<?= $d['foto']; ?>"
width="120"
class="img-thumbnail">

<?php
}
?>

<br><br>

<button
type="submit"
class="btn btn-success">

💾 Update

</button>

<a
href="media.php?conten=biodata"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>