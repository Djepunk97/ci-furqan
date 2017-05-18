<!DOCTYPE html>
<html>
<head>
	<title>Sign in/Sign up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo site_url('assets/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/css/login.css')?>" rel="stylesheet">		
	<link href="<?php echo base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js')?>"></script>
</head>
<body>

	<a id="show-login" href="javascript:void(0)" class="btn btn-primary btn-lg back-to-right" role="button" title=" I Want Login" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

	<a id="show-register" href="javascript:void(0)" class="btn btn-primary btn-lg back-to-down" role="button" title=" I Want Register" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

<div id="main-view">


</div>
</body>
</html>
<script type="text/javascript">
 $(document).ready(function(){
 
 $("#main-view").load('<?php echo site_url('reglog/login');?>');

 $("#show-register").click(function(){
 $("#main-view").empty();
 $("#main-view").load('<?php echo site_url('reglog/register');?>');
 });

 $("#show-login").click(function(){
 $("#main-view").empty();
 $("#main-view").load('<?php echo site_url('reglog/login');?>');
 });

 });
 </script>