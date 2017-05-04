<!DOCTYPE html>
<html>
<head>
	<title>Pertanyaan</title>
</head>
<body>
	<div id="main-view">
	</div>
</body>
</html>
<script src="<?=site_url('assets/js/jquery-2.2.4.min.js')?>"></script>
<script type="text/javascript">
 $(document).ready(function(){
 
 $("#main-view").load('<?php echo site_url('pertanyaan/v_all_pertanyaan');?>');

 $("#show-crud").click(function(){
 $("#main-view").empty();
 $("#main-view").load('<?php echo site_url('admin/crud');?>');
 });

 });

 </script>