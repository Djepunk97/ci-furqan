<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $this->load->view('admin/navbar');
?>
 
 
      <!-- Main component for a primary marketing message or call to action -->
      <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-body">
            <div id="main-view"></div>
          </div>
        </div>    
      </div>
 
    </div> <!-- /container -->
<?php $this->load->view('admin/footer');?>
<script type="text/javascript">
 $(document).ready(function(){
 
 $("#main-view").load('<?php echo site_url('admin/home');?>');


 $("#show-home").click(function(){
 $("#main-view").empty();
 $("#main-view").load('<?php echo site_url('admin/home');?>');
 });


 $("#show-crud").click(function(){
 $("#main-view").empty();
 $("#main-view").load('<?php echo site_url('admin/crud');?>');
 });

 });

  function table(param){
  var target="<?php echo site_url() ?>/admin/table";
  var xdata={ table : param }
      
  $("#main-view").empty();
      
  $.post(target,xdata,function(data){
  $("#main-view").html(data);
  });
 }
 </script>