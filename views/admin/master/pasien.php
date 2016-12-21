<?php echo $data['header'];?>

			<div class="col-md-12">
				<div class="row">
					<ul class="breadcrumb">
						<li>
							<a href="?ur=usia/index">Home</a> <span class="divider"></span>
						</li>
						<li>
							<a href="#">Master</a> <span class="divider"></span>
						</li>
						<li class="active">
							Pasien
						</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h2>
							Daftar Pasien
						</h2>
						<?php if(isset($data['error'])){ ?>
						<div id="success-alert" class="alert alert-warning alert-dismissable fade in" role="alert">
						        <?php echo $data['error'];?>
						        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
						</div>
						<?php } ?>
						<form action="?url=admin/pasien/add" method="post">
							<div class="form-group">
								<input type="text" class="form-item" id="nama" name="nama" placeholder="Nama Pasien" value="<?php echo $data['nama'];?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="usia" name="usia" placeholder="Usia" value="<?php echo $data['usia'];?>">
								<label for="usia"> tahun</label>
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="berat" name="berat" placeholder="Berat" value="<?php echo $data['berat'];?>">
								<label for="berat"> kg</label>
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="tinggi" name="tinggi" placeholder="Tinggi" value="<?php echo $data['tinggi'];?>">
								<label for="tinggi"> cm</label>
							</div>
							<div class="form-group">
								<textarea size=10 line=20 class="form-item" id="alamat" name="alamat" placeholder="Alamat">
								<?php echo $data['alamat'];?>
								</textarea>
							</div>
							<div class="form-group">
								<label for="kelamin">Kelamin</label>
								<input type="radio" class="form-item" name="kelamin" value="L" <?php echo $data['kelamin']=='L'?'checked':'';?>>Laki - laki
								<input type="radio" class="form-item" name="kelamin" value="P" <?php echo $data['kelamin']=='P'?'checked':'';?>>Perempuan
							</div>
							<div class="form-group">
								<label for="menikah">Menikah</label>
								<input type="radio" class="form-item" name="menikah" value="Y" <?php echo $data['menikah']=='Y'?'checked':'';?>>Ya
								<input type="radio" class="form-item" name="menikah" value="T" <?php echo $data['menikah']=='T'?'checked':'';?>>Tidak
							</div>
							<div class="form-group"><button class="btn btn-success" type="submit">Save</button></div>
						</form>
					</div>
					<div class="col-md-8">
					<form id="list" action="?url=user/pasien" method="post" role="form">
						<table class="table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Pasien</th>
									<th>Usia</th>
									<th>Berat</th>
									<th>Tinggi</th>
									<th>Alamat</th>
									<th>Kelamin</th>
									<th>Menikah</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td colspan="9">
										<a class="btn" href="<?php echo $data['first'];?>"><<</a>
										<a class="btn" href="<?php echo $data['prev'];?>"><</a>
										<a class="btn" href="<?php echo $data['next'];?>">></a>
										<a class="btn" href="<?php echo $data['end'];?>">>></a>
									</td>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($data['datas'] as $pasien) { ?>
								<tr>
									<td><?php echo $pasien->idpasien;?></td>
									<td><?php echo $pasien->nmpasien;?></td>
									<td><?php echo $pasien->usia; ?></td>
									<td><?php echo $pasien->berat; ?></td>
									<td><?php echo $pasien->tinggi; ?></td>
									<td><?php echo $pasien->alamat; ?></td>
									<td><?php echo $pasien->kelamin=="L"?"Laki-laki":"Perempuan"; ?></td>
									<td><?php echo $pasien->menikah=="0"?"Tidak/Belum Menikah":"Sudah Menikah"; ?></td>
									<td><a class="btn" href="?url=user/pasien/remove/<?php echo $pasien->idpasien;?>" >Hapus</button></a>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</form>
					</div>
				</div>

			</div>
<?php echo $data['footer'];?>