<?php  
if (isset($gagal)) {
	echo "<h2>".$gagal."</h2>";
	unset($gagal);
}
?>
<form id="form-login-user">
Email:<input type="email" id="email" /><br>
Password:<input type="password" id="password" /><br>
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
	 location.href = '<?php echo site_url('reglog/cek_level');?>';
	 },
	 error:function (){
	 $('#main-view').prepend("<h2>login Gagal!</h2>");
	 }
 });
 return false;
 });
});
</script>