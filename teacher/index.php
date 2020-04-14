<?php
	require 'tchr_authenticate.php';
	require 'tchr_header.php';
?>

<style>
	.btn {
		margin: 1px;
		border-radius: 0;
	}
</style>

<script>
	var u = <?php echo json_encode($_GET['user']); ?>;
	var k = <?php echo json_encode($_GET['key']); ?>;

	function loadAnswer(x) {
		window.open('tchr_show_answer.php?user='+u+'&key='+k+'&qstn='+x);
	}
	
	function setValField(x) {
		document.getElementById('qstn_id_forpassing').value=x;
	}

	function assignQstn() {
		var c = document.getElementById('qstn_id_forpassing').value;
		var d = document.getElementById('frmPassOut').value;

		if(d && !isNaN(d) && d>2000 && d<10000) {
			window.location='tchr_assign_qstn_save.php?user='+u+'&key='+k+'&q='+c+'&p='+d;
		}
		else
			alert('Invalid Year');
	}

	function deleteQstn(qstn) {
		window.location='tchr_del_qstn.php?user='+u+'&key='+k+'&qstn='+qstn;
	}
</script>

<?php
	require 'tchr_menu.php';

	$strm_id=explode('_',$_GET['user']);
	$sql="select qstn_id, qstn_name, qstn_key, qstn_vector, question.strm_id as stream, time from teacher, question where teacher.tchr_id=".$strm_id[1]." and teacher.strm_id=question.strm_id";
	$result=mysqli_query($link,$sql);

	echo "<div><input type='hidden' id='qstn_id_forpassing' /></div>";

	while($row=mysqli_fetch_assoc($result)) {
		echo "<div class='row' style='margin: 5px;'>";
		echo "<div class='col-sm-3 d-flex justify-content-center' style='border: 2px solid #840ca9; color: #840ca9; font-weight: bold; padding-top: 5px;'>".strtoupper($row['qstn_name'])."</div>";
		echo "<div class='col-sm-4'>";
		echo "<button type='button' class='btn btn-primary' onclick='loadAnswer(".$row['qstn_id'].")' ><i class='fas fa-eye'></i> Show Answer</button>";
		echo "<button type='button' class='btn btn-success' onclick='setValField(".$row['qstn_id'].")' data-toggle='modal' data-target='#myModal'><i class='fas fa-paper-plane'></i> Assign</button>";
		echo "<button type='button' class='btn btn-danger' onclick='deleteQstn(".$row['qstn_id'].")'><i class='fas fa-trash-alt'></i> Delete</button>";
		echo "</div>";
		echo "</div>";
	}
?>

<!-- The Modal -->
<div class="modal" id="myModal">
<div class="modal-dialog">
	<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">PASSOUT YEAR</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
				</div>
				<input type="text" placeholder="year" id="frmPassOut" />
			</div>
		</div>
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-success" onclick='assignQstn()'><i class="fas fa-save"></i> Submit</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off"></i> Close</button>
		</div>

	</div>
</div>
</div>


<?php

	require 'tchr_footer.php';
?>