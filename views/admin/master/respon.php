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
							respon
						</li>
					</ul>
					<h3>
						<center>DAFTAR RESPON</center>
					</h3>
				</div>
				<div class="row">
					<div class="col-md-4">
						<form action="?url=admin/respon/add" method="post">
							<input type="hidden" class="form-item" id="kode" name="kode" value="<?php echo $data['kode'];?>">
							<div class="form-group">
								<select name="" id="" class="form-control">
								<?php foreach ($data['diagnosa'] as $diagnosa) { ?>
									<option value=""><?php echo $diagnosa->iddiagnosa.' - '.$diagnosa->pertanyaan;?></option>
								<?php } ?>
								</select></div>
							<div class="form-group">
								<label class="form-label">Kode</label>
								<input type="text" class="form-item" value="<?php echo $data['kode'];?>" disabled>
							</div>
							<div class="form-group">
								<!-- <label class="form-label"></label> -->
								<textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Isi Jawaban"><?php echo $data['deskripsi'];?></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-success" type="submit">Save</button>
							</div>
						</form>
					</div>
					<div class="col-md-8">
						<div class="col-md-12">
						<form id="list" action="?url=admin/diagnosa" method="post" role="form">
							<table class="table">
								<thead>
									<tr>
										<th>Kode Diagnosa</th>
										<th>Isi Respon Jawaban</th>
										<th width="50px" colspan="2">&nbsp;</th>
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
									<?php foreach ($data['datas'] as $respon) { ?>
									<tr>
										<td><?php echo $respon->iddiagnosa;?></td>
										<td><?php echo $respon->describes; ?></td>
										<td>
											<a class="btn btn-danger" href="?url=admin/respon/remove/<?php echo $diagnosa->idrespon;?>" >Hapus</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</form>
						</div>
						<?php if(isset($data['respons'])&&$data['respons']->num_rows!=0){ ?>
						<div class="col-md-12">
							<b>Pertanyaan:</b><br>
							<?php echo $data['d']->iddiagnosa.' - '.$data['d']->pertanyaan;?>
							<table class="table">
								<thead>
									<tr>
										<th>Id</th>
										<th>Jawaban</th>
										<th>Nilai</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<td colspan="3">
											<a class="btn" href="<?php echo $data['resfirst'];?>"><<</a>
											<a class="btn" href="<?php echo $data['resprev'];?>"><</a>
											<a class="btn" href="<?php echo $data['resnext'];?>">></a>
											<a class="btn" href="<?php echo $data['resend'];?>">>></a>
										</td>
									</tr>
								</tfoot>
								<tbody>
								<?php foreach ($data['respons']->data as $respon) { ?>
									<tr>
										<td><?php echo $respon->idrespon; ?></td>
										<td><?php echo $respon->describes; ?></td>
										<td><?php echo $respon->nilai; ?></td>
									</tr>
								<?php } ?>
								</tbody>		
							</table>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
<?php echo $data['footer'];?>