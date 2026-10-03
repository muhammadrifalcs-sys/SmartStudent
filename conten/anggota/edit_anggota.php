<?php
include './koneksi/koneksi.php';
$data_anggota2 = mysqli_query($koneksi, "SELECT * FROM tbl_anggota");
while ($edit = mysqli_fetch_array($data_anggota2)) {
?>
<form action="conten/anggota/edit_anggota_act.php" method="post">
    <div class="modal fade" id="edit-<?php echo $edit['id_anggota']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota <?php echo $edit['nama_anggota']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="nama_anggota" class="form-control" value="<?php echo $edit['nama_anggota']; ?>" required>
                        <input type="hidden" name="id_anggota" value="<?php echo $edit['id_anggota']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" name="no_telp_anggota" class="form-control" value="<?php echo $edit['no_telp_anggota']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email Anggota</label>
                        <input type="email" name="email_anggota" class="form-control" value="<?php echo $edit['email_anggota']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Anggota</label>
                        <textarea name="alamat_anggota" class="form-control" required><?php echo $edit['alamat_anggota']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">&#128190; Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
}
?>