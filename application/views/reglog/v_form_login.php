
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
                <p class="form-title">
                    Sign In</p>
					<form id="form-login-user" class="login">
					<input type="email" name="email" placeholder="email"/><br>
					<input type="password" name="password" placeholder="password"/><br>
					<input type="submit" class="btn btn-success btn-sm" value="Login">
					</form>
			 </div>
        </div>
    </div>
</div>
		
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

	<body>
</html>