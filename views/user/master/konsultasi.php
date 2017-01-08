<?php echo $data['header'];?>
		<?php $p = $data['pertanyaan'];?>
<form action="?url=user/konsultasi" method="POST">
<input type="hidden" name="idkonsultasi" value="10">
<input type="hidden" name="kdgejala" value="<?php echo $data['gejala']->kode;?>">
<input type="hidden" name="pasien" value="12">
<input type="hidden" name="dokter" value="">
<div class="panel">
	<div class="panel-heading">
		<label class="label"><h4>PERTANYAAN</h4></label>
	</div>
	<div class="panel-body">
		<div style="overflow: visible;overflow-y: scroll; height: 300px;">
		<?php //echo $p->iddiagnosa.' - '.$p->pertanyaan; ?>
		<table class="table">
			<tr>
				<th>ID</th><th>Pertanyaan</th><th>&nbsp;</th>
			</tr>
			<?php echo $i;?>
			<?php foreach ($data['pertanyaan'] as $pertanyaan) { ?>
			<tr>
				<td><?php echo $pertanyaan->iddiagnosa;?></td>
				<td><?php echo $pertanyaan->pertanyaan;?></td>
				<td>
					<input type="radio" id="konsultasi<?php echo $i;?>" name="konsultasi<?php echo $i;?>" value="ya">
					<label for="konsultasi">Ya</label>
					<input type="radio" id="konsultasi<?php echo $i;?>" name="konsultasi<?php echo $i;?>" value="tidak">
					<label for="konsultasi">Tidak</label>
				</td>
			</tr>
			<?php $i++;} ?>

		</table>
		</div>
	</div>
	<div class="panel-footer" align="center">
		<button name="respon" type="submit" class="btn btn-success" value="ya">Simpan</button>
		<button name="respon" type="button" class="btn btn-warning" value="tidak">Reset</button>
	</div>
</div>
</form>
<?php echo $data['footer'];?>