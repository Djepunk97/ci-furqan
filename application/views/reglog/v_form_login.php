<form id="form-login-user">
Email:<input type="email" name="email" /><br>
Password:<input type="password" name="password" /><br>
<input type="submit" value="Login">
</form>
<script type="text/javascript">
 $(document).ready(function(){
$("#form-login-user").submit(function(){
 $.ajax({
 	type: 'POST',
 	url: '<?php echo site_url('reglog/cek_login');?>',
 	data: $(this).serialize(),
	 success:function (data) {
		 if(data=="berhasil"){
		 	 $("#main-view").empty();
	 		 location.href="<?php echo site_url('reglog/cek_level'); ?>";
		 }else{
	 		 $('#main-view').prepend(data);
		 }
	 },
	 error:function (){
	 $('#main-view').prepend("<h2>login Gagal!</h2>");
	 }
 });
 return false;
 });
});
</script>