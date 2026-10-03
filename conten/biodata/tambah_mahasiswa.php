<?php
include "./koneksi/koneksi.php";
?>

<div class="container">

<div class="card">

<div class="card-header bg-primary text-white">

<h4>➕ Tambah Mahasiswa</h4>

</div>

<div class="card-body">

<form action="conten/biodata/simpan_mahasiswa.php"
method="POST"
enctype="multipart/form-data">

<div class="form-group">

<label>NIM</label>

<input type="text"
name="nim"
class="form-control"
required>

</div>

<div class="form-group">

<label>Nama Mahasiswa</label>

<input type="text"
name="nama"
class="form-control"
required>

</div>

<div class="form-group">

<label>Program Studi</label>

<input type="text"
name="prodi"
class="form-control"
required>

</div>

<div class="form-group">

<label>Semester</label>

<input type="text"
name="semester"
class="form-control"
required>

</div>

<div class="form-group">

<label>Kelas</label>

<input type="text"
name="kelas"
class="form-control">

</div>

<div class="form-group">

<label>Jenis Kelamin</label>

<select name="jenis_kelamin"
class="form-control">

<option>Laki-laki</option>

<option>Perempuan</option>

</select>

</div>

<div class="form-group">

<label>No HP</label>

<input type="text"
name="no_hp"
class="form-control">

</div>

<div class="form-group">

<label>Email</label>

<input type="email"
name="email"
class="form-control">

</div>

<div class="form-group">

<label>Foto</label>

<input type="file"
name="foto"
class="form-control">

</div>

<br>

<button
class="btn btn-success">

💾 Simpan

</button>

<a href="media.php?conten=biodata"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>