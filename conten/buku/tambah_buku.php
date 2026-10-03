<?php
//DATA PILIHAN
include '././koneksi/koneksi.php';
$data_penerbit = mysqli_query($koneksi,"SELECT * FROM 	tbl_penerbit");
$data_rak = mysqli_query($koneksi,"SELECT * FROM 	tbl_rak");
?>
<form action="conten/buku/simpan_buku.php" method="post">
	<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="form-group">
		        		<label>Pilih Rak</label>
		        		<select name="id_rak" class="form-control">
							<option value="">->PILIH<-</option>
							<?php 
								while ($row_rak = mysqli_fetch_array($data_rak)) {
								?>
								<option value="<?php echo $row_rak['id_rak']?>"><?php echo $row_rak['kode_rak']?></option>
								<?php
								}
								?>
						</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Kategori</label>
		        		<input type="text" name="kategori" class="form-control" placeholder="Input Kategori" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Nama Buku</label>
		        		<input type="text" name="nama_buku" class="form-control" placeholder="Input Judul Buku" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Harga Buku</label>
		        		<input type="number" name="harga" class="form-control" placeholder="Input Harga" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Stok</label>
		        		<input type="text" name="stok" class="form-control" placeholder="Input Stock">
		        	</div>
		        	<div class="form-group">
		        		<label>Pilih Penerbit</label>
		        		<select name="id_penerbit" class="form-control">
							<option value="">->Pilih<-</option>
							<?php while ($row_penerbit = mysqli_fetch_array($data_penerbit)) {
								?>
							<option value="<?php echo $row_penerbit['id_penerbit']?>"><?php echo $row_penerbit['nama_penerbit']?></option>
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