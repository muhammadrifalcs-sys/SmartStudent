<?php 
include '././koneksi/koneksi.php';
$data_buku = mysqli_query($koneksi,"SELECT * FROM tbl_buku B, tbl_rak R, tbl_penerbit P  WHERE B.id_rak=R.id_rak AND B.id_penerbit=P.id_penerbit");
$data_penerbit = mysqli_query($koneksi,"SELECT * FROM 	tbl_penerbit");
$data_rak = mysqli_query($koneksi,"SELECT * FROM 	tbl_rak");
while ($edit = mysqli_fetch_array($data_buku)) {
?>
<form action="conten/buku/edit_buku_act.php" method="post">
	<div class="modal fade" id="edit-<?php echo $edit['id_buku']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Edit Data Buku <?php echo $edit['nama_buku']?></h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="form-group">
		        		<label>Pilih Rak</label>
		        		<input type="hidden" name="id_buku" value="<?php echo $edit['id_buku']?>">
		        		<select name="id_rak" class="form-control">
							<option value="<?php echo $edit['id_rak']?>"><?php echo $edit['kode_rak']?></option>
							<?php 
								while ($row_rak1 = mysqli_fetch_array($data_rak)) {
								?>
								<option value="<?php echo $row_rak1['id_rak']?>"><?php echo $row_rak1['kode_rak']?></option>
								<?php
								}
								?>
						</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Kategori</label>
		        		<input type="text" name="kategori" class="form-control" value="<?php echo $edit['kategori']?>" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Nama Buku</label>
		        		<input type="text" name="nama_buku" class="form-control" value="<?php echo $edit['nama_buku']?>"required>
		        	</div>
		        	<div class="form-group">
		        		<label>Harga Buku</label>
		        		<input type="number" name="harga" class="form-control" value="<?php echo $edit['harga']?>" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Stok</label>
		        		<input type="text" name="stok" class="form-control" value="<?php echo $edit['stok']?>">
		        	</div>
		        	<div class="form-group">
		        		<label>Pilih Penerbit</label>
		        		<select name="id_penerbit" class="form-control">
							<option value="<?php echo $edit['id_penerbit']?>"><?php echo $edit['nama_penerbit']?></option>
							<?php while ($row_penerbit1 = mysqli_fetch_array($data_penerbit)) {
								?>
							<option value="<?php echo $row_penerbit1['id_penerbit']?>"><?php echo $row_penerbit1['nama_penerbit']?></option>
							<?php
							}
							?>
						</select>
		        	</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="reset" type="submit" class="btn btn-secondary" data-dismiss="modal">X Tutup</button>
		        	<button type="submit" type="reset" class="btn btn-primary">&#128190; Simpan</button>
		      	</div>
	    	</div>
	  	</div>
	</div>
</form>
<?php
}
?>