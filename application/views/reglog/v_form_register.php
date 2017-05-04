<form id="form-register-user">
Nama:<input type="text" name="nama" /><br>
Email:<input type="email" name="email" /><br>
Password:<input type="password" name="password" /><br>
Tentang:<textarea name="tentang"></textarea><br>
<input id="btn-register" type="submit" value="Register"><br>
</form>
<script type="text/javascript">
 $(document).ready(function(){
	$("#form-register-user").submit(function(){
	 $.ajax({
	 	type: 'POST',
	 	url: '<?php echo site_url('reglog/proses_register');?>',
	 	data: $(this).serialize(),
		 success:function (data) {
			 if(data=="gagal"){
			 	 $('#main-view').prepend("<h2>Registrasi Gagal!</h2>");
			 }else{
			 	 $("#main-view").empty();
		 		 $('#main-view').load("<?php echo site_url('reglog/login'); ?>");
		 		 $('#main-view').prepend("<h2>Registrasi Berhasil!</h2>");
			 }
		 },
		 error:function (){
		 $('#main-view').prepend("<h2>Registrasi Gagal!</h2>");
		 }
	 });
	 return false;
	 });
});
</script>