<form id="form-pertanyaan">
<table>
	<tr>
		<td>Judul:</td>
		<td><input type="text" name="judul"></td>
	</tr>
	<tr>
		<td>Pertanyaan:</td>
		<td><textarea name="isi"></textarea></td>
	</tr>
	<tr>
		<td>Kategori pertanyaan:</td>
		<td>
			<select name="kategori">
				<?php foreach ($daftar_kategori as $kategori) { ?>
					<option value='<?php echo $kategori->id_kategori;?>'><?php echo $kategori->nama_kategori;?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="proses" value="Submit" />
		</td>
	</tr>
</table>
</form>
<script type="text/javascript">
 $(document).ready(function(){
	$("#form-pertanyaan").submit(function(){
	 $.ajax({
	 	type: 'POST',
	 	url: '<?php echo site_url('pertanyaan/proses_submit_pertanyaan');?>',
	 	data: $(this).serialize(),
		 success:function (data){
			 	 $("#main-view").empty();
		 		 $("#main-view").load('<?php echo site_url('pertanyaan/v_all_pertanyaan');?>');
		 		 $("#form-view").empty();
		 		 $("#show-form").show();
		 },
		 error:function (){
		 $('#form-view').prepend("<h2>Registrasi Gagal!</h2>");
		 }
	 });
	 return false;
	 });
 });
</script>