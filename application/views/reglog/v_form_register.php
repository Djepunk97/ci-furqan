<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
				<p class="form-title">
                    Sign UP</p>
				<form id="form-register-user" class="login">
				<input type="text" name="nama" placeholder="nama" /><br>
				<input type="email" name="email" placeholder="email"/><br>
				<input type="password" name="password" placeholder="password"/><br>
				<textarea name="tentang" placeholder="tentang"></textarea><br>
				<input id="btn-register" class="btn btn-success btn-sm" type="submit" value="Register"><br>
				</form>
				</div>
        </div>
    </div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
	$("#form-register-user").submit(function(){
	 $.ajax({
	 	type: 'POST',
	 	url: '<?php echo site_url('reglog/proses_register');?>',
	 	data: $(this).serialize(),
		 success:function (data) {
		  $('#main-view').load("<?php echo site_url('reglog/login'); ?>");
		  $('#main-view').prepend("<h2>Registrasi Berhasil!</h2>");
		 },
		 error:function (){
		 $('#main-view').prepend("<h2>Registrasi Gagal!</h2>");
		 }
	 });
	 return false;
	 });
});
</script>