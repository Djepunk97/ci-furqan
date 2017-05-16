<!DOCTYPE html>
<html>
<head>
	<title>Pertanyaan</title>
</head>
<body>
	<?php
		if (isset($nama)) {
			echo "Selamat Datang ".$nama."<br>";
		}
	?>
	<button id="show-form" onclick="javascript:show_form(0)">Ingin bertanya?</button>
	<div id="form-view">
	</div>
	<div id="main-view">
	</div>
	<?php
		if (isset($nama)) {
			echo '<a id="logout" href="javascript:void(0)">Logout</a>';
		}
	?>
	
</body>
</html>
<script src="<?=site_url('assets/js/jquery-2.2.4.min.js')?>"></script>
<script type="text/javascript">
 $(document).ready(function(){
 $("#main-view").load('<?php echo site_url('pertanyaan/v_all_pertanyaan');?>');

 $("#logout").click(function(){
 location.href='<?php echo site_url('pertanyaan/logout');?>';
 });

 });

  function show_form(param){
	var target='<?php echo site_url('pertanyaan/cek_sesion');?>';
	var xdata={ form : param };
			
	$.post(target,xdata,function(data){
		 if(data=="gagal"){
		 	location.href="<?php echo site_url('reglog');?>";
		 }else{
		 	 $("#form-view").load('<?php echo site_url('pertanyaan/form_pertanyaan');?>');
		 	 $("#show-form").hide();
		 }
	});
 }

 </script>