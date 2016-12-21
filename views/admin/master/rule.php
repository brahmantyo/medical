<?php echo $data['header'];?>
			<div id="form-edit" title="Edit Rule">
				<form action="">
					<label for="rule-edit">Rule</label>
					<input type="text" id="rule-edit" >
				</form>
			</div>
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
							Rule
						</li>
					</ul>
					<h3>
						<center>Rule</center>
					</h3>
				</div>
				<div class="panel">
					<div class="panel-body">
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
						<?php if($data['state']=='edit'){?>
						<form action="?url=admin/rule/editsave" method="post">
						<?php } else { ?>
						<form action="?url=admin/rule/add" method="post">
						<?php } ?>
							<table class="table table-bordered table-condensed">
								<tr>
									<td>Rule</td>
									<td>
										<input type="text" value="<?php echo $data['rule'];?>" disabled>
										<input type="hidden" name="rule" value="<?php echo $data['rule'];?>">
									</td>
								</tr>
								<tr>
									<td>Gangguan Penyakit</td>
									<td>
										<select name="gangguan" id="gangguan">
											<option value="">-- Pilih Gangguan Penyakit --</option>
											<?php foreach ($data['gangguan'] as $keygangguan => $gangguan) { ?>
											<option value="<?php echo $keygangguan;?>" <?php echo $gangguan->select?'selected':'';?>><?php echo $gangguan->data->kode;?> - <?php echo $gangguan->data->nmgangguan;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Gejala</td>
									<td>
										<select name="gejala[]" data-toggle="tooltip" title="Press with CTRL for multiple selection" class="form-control"  height="100px" multiple>
											<?php foreach ($data['gejala'] as $keygejala => $gejala) { ?>
											<option value="<?php echo $keygejala; ?>" <?php echo $gejala->select?'selected':'';?>><?php echo $gejala->data->kode.' - '.$gejala->data->nmgejala; ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<center>
											<button type="submit" class="btn btn-success"><?php echo $data['state']=='edit'?'Simpan':'Tambah';?></button>
											<?php if($data['state']=='edit'){?>
											<a href="?url=admin/rule" class="btn btn-info">Cancel</a>
											<?php } ?>
										</center>
									</td>
								</tr>
							</table>
						</form>
						<table class="table table-bordered table-condensed">
							<thead>
								<tr>
									<th width="100px"><center>Kode Rule</center></th>
									<th width="150px"><center>Gangguan</center></th>
									<th ><center>Gejala</center></th>
									<th width="190px"></th>
								</tr>
							</thead>
							<tbody>
								<?php if(!$data['rules']){?>
								<tr>
									<td colspan="4"><center><i>Data belum tersedia</i></center></td>
								</tr>
								<?php } ?>
								<?php foreach ($data['rules'] as $keyrule=>$rule) { ?>
								<tr>
									<td><?php echo $keyrule; ?></td>
									<td><a data-togle="tooltip" title="<?php echo $rule->nmgangguan;?>" class="label label-danger"><?php echo $rule->kdgangguan;?></a></td>
									<td>
										<?php foreach ($rule->gejala as $keygejala => $gejala) { ?>
										<a data-togle="tooltip" title="<?php echo $gejala;?>" class="label label-warning"><?php echo $keygejala;?></a>
										<?php } ?>
									</td>
									<td>
										<a href="?url=admin/rule/remove/<?php echo $keyrule;?>" class="btn btn-danger text-default">Hapus</a>
										<!-- <a value="<?php echo $keyrule;?>" class="btn btn-success btnedit">Edit</a> -->
										<a href="?url=admin/rule/edit/<?php echo $keyrule;?>" class="btn btn-success text-default">Edit</a>

									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
<script>
	$(document).ready(function(){

		$(function() {
			dialog = $("#form-edit").dialog({
				autoOpen: false,
				modal: true,
				height: 400,
				width: 600,
				open: function(event){
					var id = $(this).data('id');
					var dt = dialog.load('?url=admin/ajax/editrule/'+id,function(a){
						// alert(a[0]);
					});
				},
				buttons: {
					Cancel: function() {
					  dialog.dialog( "close" );
					}
				},
				// close: function() {
					// form[0].reset();
					// allFields.removeClass( "ui-state-error" );
				// },				
			});
	// 		$("#dialog").dialog({
	// 			autoOpen: false
	// 		});
	 		$(".btnedit").on("click", function(e) {
	 			e.preventDefault();
				$("#form-edit").data('id',$(this).attr('value')).dialog("open");
			});
		});

	});
</script>
<?php echo $data['footer'];?>