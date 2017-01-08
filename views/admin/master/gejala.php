<?php echo $data['header'];?>

			<div class="col-md-12">
				<div class="row">
					<ul class="breadcrumb">
						<li>
							<a href="?ur=admin/index">Home</a> <span class="divider"></span>
						</li>
						<li>
							<a href="#">Master</a> <span class="divider"></span>
						</li>
						<li class="active">
							Gejala
						</li>
					</ul>
					<h2>
						Daftar Gejala
					</h2>
				</div>
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
					<div class="col-md-4">
						<form action="?url=admin/gejala/<?php echo $data['state'];?>" method="post">
							<input type="hidden" name="kode" value="<?php echo $data['kode'];?>">
							<input type="hidden" name="state" value="<?php echo $data['state'];?>">
							<div class="form-group">
								<input type="text" class="form-item" placeholder="<?php echo $data['kode'];?>" disabled>
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="nama" name="nama" placeholder="Nama Gejala" value="<?php echo $data['nama'];?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="konteks" name="konteks" placeholder="Konteks (Optional)" value="<?php echo $data['konteks'];?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="deskripsi" name="deskripsi" placeholder="Deskripsi (Optional)" value="<?php echo $data['deskripsi'];?>">
							</div>
							<div class="form-group">
								<select name="diagnosa" id="" class="form-control">
									<option value="">-- Pertanyaan Diagnosa --</option>
									<?php foreach ($data['diagnosa'] as $diagnosa) { ?>
									<option value="<?php echo $diagnosa->iddiagnosa;?>" <?php echo $data['iddiagnosa']==$diagnosa->iddiagnosa?'selected':'';?>><?php echo $diagnosa->iddiagnosa.' - '.$diagnosa->pertanyaan;?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group"><button class="btn btn-success" type="submit">Save</button></div>

						</form>
					</div>
					<div class="col-md-8">
					<form id="list" action="?url=admin/gejala" method="post" role="form">
						<table class="table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode.</th>
									<th>Nama Gejala</th>
									<th>Konteks</th>
									<th>Keterangan</th>
									<th>Pertanyaan</th>
									<th>&nbsp</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td colspan="11">
										<a class="label label-info" href="<?php echo $data['first'];?>"><<</a>
										<a class="label label-info" href="<?php echo $data['prev'];?>"><</a>
										<a class="label label-info" href="<?php echo $data['next'];?>">></a>
										<a class="label label-info" href="<?php echo $data['end'];?>">>></a>
									</td>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($data['datas'] as $gejala) { ?>
								<tr>
									<td><?php echo $gejala->id;?></td>
									<td><?php echo $gejala->kode;?></td>
									<td><?php echo $gejala->nmgejala;?></td>
									<td><?php echo $gejala->konteks; ?></td>
									<td><?php echo $gejala->deskripsi; ?></td>
									<td>
										<a href="?url=admin/diagnosa/view/<?php echo $gejala->iddiagnosa;?>">
											<?php echo $gejala->iddiagnosa; ?>
										</a>
									</td>
									<td>
										<a class="btn btn-success" href="?url=admin/gejala/edit/<?php echo $gejala->kode;?>" >Edit</a>
										<a class="btn btn-danger" href="?url=admin/gejala/remove/<?php echo $gejala->id;?>" >Hapus</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</form>
					</div>
				</div>

			</div>
<?php echo $data['footer'];?>