<?php
	require 'admin_authenticate.php';
	require 'admin_header.php';
	require 'admin_menu.php';
?>

<style>
	.card {
		margin-left: 30px;
		margin-top: 10px;
	}
	sub {
		font-weight: bold;
	}
</style>

<script>
var admin_key = <?php echo json_encode($_GET['key']); ?>;

$(document).ready(createDashboard());

function createDashboard(){
	var id = setInterval(loadDashboard, 5000);
}

function loadDashboard() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("dashboard").innerHTML = this.responseText;
			document.getElementById("dashboardOptions").hidden = false;
		}
	};
	xhttp.open("GET", "admin_dashboard.php?user=0&key="+admin_key, true);
	xhttp.send();
}

function loadPage(page) {
	window.open(page + "?user=0&key="+admin_key);
}
</script>

<div id="dashboard">
	<div class="d-flex justify-content-center text-danger" style="font-weight: bold;">Please wait while dashboard is loading....</div>
</div>


<div id='dashboardOptions' hidden>
	<!-- Departments -->
	<div class="row">
		<div class="col-sm-3 divDept" style="margin-left: 30px; margin-top: 20px;" onclick="loadPage('admin_departments.php')"><i class="fas fa-university"></i> Departments</div>
	</div>

	<!-- Subjects -->
	<div class="row">
		<div class="col-sm-3 divSubjects" style="margin-left: 30px; margin-top: 20px;" onclick="loadPage('admin_subjects.php')"><i class="fas fa-book"></i> Subjects</div>
	</div>
</div>

<?php
	require 'admin_footer.php';
?>