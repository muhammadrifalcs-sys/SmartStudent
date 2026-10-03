	<form action="conten/biodata/simpan_biodata.php" method="post">
	<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Tambah Data biodata</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="form-group">
		        		<label>Nama Lengkap</label>
		        		<input type="text" name="nama_lengkap" class="form-control" placeholder="Input Nama Lengkap" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Hobi</label>
		        		<input type="text" name="hobi" class="form-control" placeholder="Input Hobi" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Jenis Kelamin</label>
		        		<div>
				        	<input type="radio" name="jenis_kelamin" value="pria">pria
							<input type="radio" name="jenis_kelamin" value="wanita">wanita
		        		</div>
					</div>
					<div class="form-group">
		        		<label>Agama</label>
		        		<select name="agama" id="" class="form-control">
                            <?php
                            $agama_list = ['islam', 'kristen', 'hindu', 'buddha'];
                            foreach ($agama_list as $agama) :
                                $selected = ($edit['agama_anggota'] == $agama) ? 'selected' : '';
                            ?>
                                <option value="<?= $agama?>" <?= $selected ?>><?= ucfirst($agama) ?></option>
                            <?php endforeach; ?>
                        </select>
		        	</div>
					<div class="form-group">
		        		<label>Email</label>
		        		<input type="email" name="email" class="form-control" placeholder="Input Email" required>
		        	</div>
					<div class="form-group">
		        		<label>No Telephone</label>
		        		<input type="number" name="no_telp" class="form-control" placeholder="Input Number Lek" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Alamat</label>
		        		<textarea name="alamat" class="form-control" placeholder="Input Alamat Lek" required></textarea>
		        	</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="reset" type="submit" class="btn btn-secondary">Reset</button>
		        	<button type="submit" type="reset" class="btn btn-primary">&#128190; Simpan</button>
		      	</div>
	    	</div>
	  	</div>
	</div>
</form>