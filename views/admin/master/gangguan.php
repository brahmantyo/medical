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
							Gangguan
						</li>
					</ul>
					<h2>
						Daftar Gangguan Penyakit
					</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						<form action="?url=admin/gangguan/add" method="post">
							<input type="hidden" name="kode" value="<?php echo $data['kode'];?>">
							<div class="form-group">
								<input type="text" class="form-item" placeholder="<?php echo $data['kode'];?>" disabled>
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="nama" name="nama" placeholder="Nama Gangguan">
							</div>
							<div class="form-group">
								<input type="text" class="form-item" id="deskripsi" name="deskripsi" placeholder="Deskrips (Optional)">
							</div>
							<div class="form-group"><button class="btn btn-success" type="submit">Save</button></div>

						</form>
					</div>
					<div class="col-md-8">
					<form id="list" action="?url=admin/gangguan" method="post" role="form">
						<table class="table">
							<thead>
								<tr>
									<th>Kode.</th>
									<th>Nama Gangguan</th>
									<th>Keterangan</th>
									<th>&nbsp</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td colspan="4">
										<a class="label label-info" href="<?php echo $data['first'];?>"><<</a>
										<a class="label label-info" href="<?php echo $data['prev'];?>"><</a>
										<a class="label label-info" href="<?php echo $data['next'];?>">></a>
										<a class="label label-info" href="<?php echo $data['end'];?>">>></a>
									</td>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($data['datas'] as $gangguan) { ?>
								<tr>
									<td><?php echo $gangguan->kode;?></td>
									<td><?php echo $gangguan->nmgangguan;?></td>
									<td><?php echo $gangguan->descript; ?></td>
									<td><a class="btn btn-danger" href="?url=admin/gangguan/remove/<?php echo $gangguan->idgangguan;?>" >Hapus</a>
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