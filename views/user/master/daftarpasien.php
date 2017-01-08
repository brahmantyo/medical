<?php echo $data['header'];?>
<form action="?url=user/pasien" method="POST">
<input type="hidden" name="idpasien" value="10">
<div class="panel">
	<div class="panel-heading">
		<label class="label"><h4>PASIEN</h4></label>
	</div>
	<div class="panel-body">
				<div class="row">
						<?php if(isset($data['error'])){ ?>
						<div id="success-alert" class="alert alert-danger alert-dismissable fade in" role="alert">
						        <?php echo $data['error'];?>
						        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
						</div>
						<?php } ?>
						<?php if(isset($data['succes'])){ ?>
						<div id="success-alert" class="alert alert-success alert-dismissable fade in" role="alert">
						        <?php echo $data['succes'];?>
						        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
						</div>
						<?php } ?>
					<div class="col-md-12">
						<form action="?url=user/pasien/<?php echo $data['state'];?>" method="post">
							<input type="hidden" name="state" value="<?php echo $data['state'];?>">
							<div class="form-group">
								<input type="text" class="form-item" id="nama" name="nama" placeholder="Nama Pasien" value="<?php echo $data['nama'];?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="usia" name="usia" placeholder="Usia (Optional)" value="<?php echo $data['usia'];?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="berat" name="berat" placeholder="Berat Badan (Optional)" value="<?php echo $data['berat'];?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="tinggi" name="tinggi" placeholder="Tinggi Badan (Optional)" value="<?php echo $data['tinggi'];?>">
							</div>
							<div class="form-group">
								<label for="kelamin" class="form-item">Jenis Kelamin</label>
								<input type="radio" class="form-item" id="kelamin" name="kelamin" value="pria"> Pria
								<input type="radio" class="form-item" id="kelamin" name="kelamin" value="wanita"> Wanita
							</div>
							<div class="form-group">
								<label for="menikah" class="form-item">Status Pernikahan</label>
								<input type="radio" class="form-item" id="menikah" name="menikah" value="menikah"> Menikah
								<input type="radio" class="form-item" id="menikah" name="menikah" value="tidakmenikah"> Tidak Menikah
							</div>
							<div class="form-group">
							
								<label for="alamat" class="form-item">Alamat</label>
								<textarea name="alamat" id="alamat" class="form-item" cols="30" rows="10"></textarea>
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="phone" name="phone" placeholder="Phone (Optional)" value="<?php echo $data['phone'];?>">
							</div>

							<div class="form-group"><button class="btn btn-success" type="submit">Save</button></div>

						</form>
					</div>

	</div>
</div>
</form>
<?php echo $data['footer'];?>