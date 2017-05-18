<!DOCTYPE html>
<html>
<head>
	<title>Sign in/Sign up</title>
	<script src="<?=base_url('assets/js/jquery-2.2.4.min.js')?>"></script>
</head>
<body>
<ul>
<li><a id="show-login" href="javascript:void(0)">Login</a></li>
<li><a id="show-register" href="javascript:void(0)">Register</a></li>
</ul>
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