<?php
	require 'tchr_authenticate.php';
	require 'tchr_header.php';
?>

<script>
	function srcQstnSet() {
		var stdQstn = document.getElementById("srcStdQuestion").value;
		var stdExam = document.getElementById("srcStdExamDate").value;

		if(stdQstn == "")
			alert('Please enter question set name');
		else {
			var t_user = <?php echo json_encode($_GET['user']); ?>;
			var t_key = <?php echo json_encode($_GET['key']); ?>;

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("srcResult").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "tchr_do_search_qstn_set.php?user="+t_user+"&key="+t_key+"&q="+stdQstn+"&e="+stdExam, true);
			xhttp.send();
		}
	}

	function loadDetailResult(res_id) {
		var t_user = <?php echo json_encode($_GET['user']); ?>;
		var t_key = <?php echo json_encode($_GET['key']); ?>;

		window.open("tchr_detail_std_result.php?user="+t_user+"&key="+t_key+"&res_id="+res_id);
	}
</script>

<?php
	require 'tchr_menu.php';																																																														
?>																																					
	<div class="row d-flex justify-content-center" style="margin-top: 50px;"><!--search fields-->
		<div class="col-sm-2"><!--question set name-->
			<div class="row d-flex justify-content-center">
				Question Set Name
			</div>
			<div class="row d-flex justify-content-center">
				<input type="text" id="srcStdQuestion" placeholder="question set name" />
			</div>
		</div>
		<div class="col-sm-2"><!--exam date-->
			<div class="row d-flex justify-content-center">
				Exam Date
			</div>
			<div class="row d-flex justify-content-center">
				<input type="date" id="srcStdExamDate" placeholder="exam date" />
			</div>
		</div>
		<div class="col-sm-1 d-flex justify-content-center" style="padding-top: 20px;"><!--button-->
			<button type="button" class="btn btn-primary" onclick="srcQstnSet()" ><i class="fas fa-search"></i> Search</button>
		</div>
	</div><!--end of search fields-->

	<div id="srcResult" style='margin-left: 70px; margin-right: 60px; margin-top: 50px;'><!--display search result-->
	</div>
<?php
	require 'tchr_footer.php';
?>																																																									