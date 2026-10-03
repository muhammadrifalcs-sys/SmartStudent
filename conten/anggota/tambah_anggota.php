<form action="conten/anggota/simpan_anggota.php" method="post">
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="nama_anggota" class="form-control" placeholder="Input Nama Anggota" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telpon</label>
                        <input type="number" name="no_telp_anggota" class="form-control" placeholder="Input Nomor Telpon Anggota" required>
                    </div>
                    <div class="form-group">
                        <label>Email Anggota</label>
                        <input type="email" name="email_anggota" class="form-control" placeholder="Input Email Anggota" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Anggota</label>
                        <textarea name="alamat_anggota" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">X Tutup</button>
                    <button type="submit" class="btn btn-primary">&#128190; Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>