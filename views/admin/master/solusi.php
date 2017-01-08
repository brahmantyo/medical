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
							Solusi
						</li>
					</ul>
					<h3>
						<center>DAFTAR SOLUSI</center>
					</h3>
				</div>
				<div class="row">
						<?php if(isset($data['error'])){ ?>
						<div id="success-alert" class="alert alert-warning alert-dismissable fade in" role="alert">
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
						<form action="?url=admin/diagnosa/add" method="post" enctype="multipart/form-data">
								<input type="hidden" class="form-item" id="kode" name="kode" value="<?php echo $data['kode'];?>">
							<div class="form-group">
								<label class="form-label">Kode</label>
								<input type="text" class="form-item" value="<?php echo $data['kode'];?>" disabled>
							</div>
							<div class="form-group">
								<textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Isi Solusi"><?php echo $data['deskripsi'];?></textarea>
							</div>
							<div class="form-group"><input type="file" class="btn btn-success" value="Upload"></div>
							<div class="form-group"><button class="btn btn-success" type="submit">Save</button></div>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
						</form>
					</div>
					<div class="col-md-12">
						<div class="col-md-12">
						<form id="list" action="?url=admin/diagnosa" method="post" role="form">
							<table class="table">
								<thead>
									<tr>
										<th>Kode</th>
										<th>Isi Pertanyaan</th>
										<th colspan="2">&nbsp;</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<td colspan="9">
											<a class="label label-info" href="<?php echo $data['first'];?>"><<</a>
											<a class="label label-info" href="<?php echo $data['prev'];?>"><</a>
											<a class="label label-info" href="<?php echo $data['next'];?>">></a>
											<a class="label label-info" href="<?php echo $data['end'];?>">>></a>
										</td>
									</tr>
								</tfoot>
								<tbody>
									<?php 
										if($data['page']!=''){
											$page = '&page='.$data['page'];
										}
									?>
									<?php foreach ($data['datas'] as $diagnosa) { ?>
									<tr>
										<td><?php echo $diagnosa->iddiagnosa;?></td>
										<td><?php echo $diagnosa->pertanyaan; ?></td>
										<td>
											<a class="btn btn-success" href="?url=admin/diagnosa/view/<?php echo $diagnosa->iddiagnosa;?><?php echo $page;?>" >View Respon</a>
										</td>
										<td>
											<a class="btn btn-danger" href="?url=admin/diagnosa/remove/<?php echo $diagnosa->iddiagnosa;?><?php echo $page;?>" >Hapus</a>
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
<!-- 								<tfoot>
									<tr>
										<td colspan="3">
											<a class="label label-info" href="<?php echo $data['resfirst'];?>"><<</a>
											<a class="label label-info" href="<?php echo $data['resprev'];?>"><</a>
											<a class="label label-info" href="<?php echo $data['resnext'];?>">></a>
											<a class="label label-info" href="<?php echo $data['resend'];?>">>></a>
										</td>
									</tr>
								</tfoot> -->
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