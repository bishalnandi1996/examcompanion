<?php
	require 'tchr_authenticate.php';
	require 'tchr_header.php';
?>

<script>
	function srcStdName() {
		var stdName = document.getElementById("srcStdName").value;
		var stdQstn = document.getElementById("srcStdQuestion").value;
		var stdRoll = "";
		var stdExam = document.getElementById("srcStdExamDate").value;
		var stdPassout = document.getElementById("srcStdPassout").value;

		if(stdName == "" && stdQstn == "" && stdExam == "" && stdPassout == "")
			alert('Please enter atleast one data');
		else {
			var t_user = <?php echo json_encode($_GET['user']); ?>;
			var t_key = <?php echo json_encode($_GET['key']); ?>;

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("srcResult").innerHTML = this.responseText;
				}
			};

			if(stdQstn == "") {
				xhttp.open("GET", "tchr_do_search.php?user="+t_user+"&key="+t_key+"&n="+stdName+"&r="+stdRoll+"&e="+stdExam+"&p="+stdPassout, true);
				xhttp.send();
			}
			else {
				xhttp.open("GET", "tchr_do_search_qstn_set.php?user="+t_user+"&key="+t_key+"&q="+stdQstn+"&e="+stdExam, true);
				xhttp.send();
			}

			
		}
	}

	function loadStdResult(st_id) {
		var t_user = <?php echo json_encode($_GET['user']); ?>;
		var t_key = <?php echo json_encode($_GET['key']); ?>;

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("srcResult").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "tchr_list_std_result.php?user="+t_user+"&key="+t_key+"&st_id="+st_id, true);
		xhttp.send();
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
		<div class="col-sm-2"><!--name-->
			<div class="row d-flex justify-content-center">
				Student Name
			</div>
			<div class="row d-flex justify-content-center">
				<input type="text" id="srcStdName" placeholder="student name" />
			</div>
		</div>
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
		<div class="col-sm-2"><!--passout year-->
			<div class="row d-flex justify-content-center">
				Passout Year
			</div>
			<div class="row d-flex justify-content-center">
				<input type="text" pattern="[0-9]{4}" id="srcStdPassout" placeholder="passout year" />
			</div>
		</div>
		<div class="col-sm-1 d-flex justify-content-center" style="padding-top: 20px;"><!--button-->
			<button type="button" class="btn btn-primary" onclick="srcStdName()" ><i class="fas fa-search"></i> Search</button>
		</div>
	</div><!--end of search fields-->

	<div id="srcResult" style='margin-left: 70px; margin-right: 60px; margin-top: 50px;'><!--display search result-->
	</div>
<?php
	require 'tchr_footer.php';
?>																																																									
