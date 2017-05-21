<?php foreach ($daftar_pertanyaan as $pertanyaan) {?>
 <fieldset>
 <h3><a  href="javascript:lihat(<?php echo $pertanyaan->id_pertanyaan;?>)"><?php echo $pertanyaan->judul;?></a></h3>
<br>
<h3><a  href="javascript:vote(<?php echo $pertanyaan->id_pertanyaan;?>,<?php echo "1";?>)">UpVote</a></h3>
<h3><a  href="javascript:vote(<?php echo $pertanyaan->id_pertanyaan;?>,<?php echo "-1";?>)">DownVote</a></h3>
 <br />
 <?php echo $pertanyaan->isi;?>
 <br />
 <?php echo "Nilai Vote : ". $pertanyaan->has_value;?>
 </fieldset>
 <br />
<?php 
}  
?>
<script type="text/javascript">
function lihat(param){
	var target='<?php echo site_url('pertanyaan/v_pertanyaan');?>';
	var xdata={ id_pertanyaan : param }
			
	$("#main-view").empty();
			
	$.post(target,xdata,function(data){
	$("#main-view").html(data);
	});
 }

function vote(param,val){
	var target='<?php echo site_url('pertanyaan/v_vote_pertanyaan');?>';
	var xdata={ id_pertanyaan : param,
				value         : val
			  }
	$("#main-view").empty();
			
	$.post(target,xdata,function(data){
	$("#main-view").html(data);
	});
 }

</script> 
