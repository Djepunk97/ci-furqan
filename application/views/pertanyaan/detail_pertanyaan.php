 <fieldset>
 <h3><?php echo $pertanyaan->judul;?></h3>
 <br />
 <?php echo $pertanyaan->isi;?>
 <br />
 </fieldset>
 <br />
 <?php foreach ($daftar_jawaban as $jawaban) {?>
 <fieldset>
 <?php echo $jawaban->isi;?>
 <br>
 <?php echo "nilai vote : ".$jawaban->has_value;?>
<a  href="javascript:vote(<?php echo $jawaban->id_jawaban;?>,<?php echo "1";?>)">UpVote</a>
<a  href="javascript:vote(<?php echo $jawaban->id_jawaban;?>,<?php echo "-1";?>)">DownVote</a>
 </fieldset>
 <br />
<?php 
}  
?>
 <form id="form-jawab">
 	<input type="hidden" name="id_pertanyaan" id="id_p" value="<?php echo $pertanyaan->id_pertanyaan;?>">
 	<textarea name="isi" placeholder="Ingin menjawab"></textarea>
 	<input type="submit" name="proses" value="Jawab">
 </form>
 <script type="text/javascript">
  $(document).ready(function(){
	$("#form-jawab").submit(function(){
	 $.ajax({
	 	type: 'POST',
	 	url: '<?php echo site_url('pertanyaan/proses_submit_jawaban');?>',
	 	data: $(this).serialize(),
		 success:function (data){
			 	var target='<?php echo site_url('pertanyaan/v_pertanyaan');?>';
			 	var param=$("#id_p").val();
				var xdata={ id_pertanyaan : param }
						
				$("#main-view").empty();
						
				$.post(target,xdata,function(data){
				$("#main-view").html(data);
				});
		 },
		 error:function (){
		 $('#form-view').prepend("<h2>Registrasi Gagal!</h2>");
		 }
	 });
	 return false;
	 });
 });

function vote(param,val){
	var target='<?php echo site_url('pertanyaan/v_vote_jawaban');?>';
	var xdata={ id_jawaban : param,
				value      : val
			  }
	$("#main-view").empty();
			
	$.post(target,xdata,function(data){
	$("#main-view").html(data);
	});
 }

 </script>
