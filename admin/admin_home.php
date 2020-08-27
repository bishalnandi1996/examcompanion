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
		}
	};
	xhttp.open("GET", "admin_dashboard.php?user=0&key="+admin_key, true);
	xhttp.send();
}

function loadPage() {
	window.open("admin_view_qstnset.php?user=0&key="+admin_key);
}
</script>

<div id="dashboard">
	<div class="d-flex justify-content-center text-danger" style="font-weight: bold;">Please wait while dashboard is loading....</div>
</div>

<?php
	require 'admin_footer.php';
?>