<?php
require 'tchr_authenticate.php';
require 'tchr_header.php';
?>


<script>
	$(document).ready(function() {
		var x = <?php echo json_encode($_GET['user']); ?>;
		var y = <?php echo json_encode($_GET['key']); ?>;
		var z1 = <?php echo json_encode($_FILES['frmQstnFile']['name']); ?>;
		var z2 = <?php echo json_encode($_POST['frmQstnSubject']); ?>;

		var qstnArguments = { user: x, key: y, filename: z1, subject: z2 }; 
		$.ajax({
			type: 'GET',
			url: "tchr_retrive_qstn.php",
			data: qstnArguments,
			dataType: "text",
			success: function(resultData) {
				document.getElementById('frmFileSQL').value= resultData;
				document.getElementById("frmSQL").submit();
			}
		});
	});
</script>

<?php

if(isset($_FILES['frmQstnFile'])) {
	$uploaddir = '../raw_uploaded_file/';
	$uploadfile = $uploaddir . $_FILES['frmQstnFile']['name'];;
	move_uploaded_file($_FILES['frmQstnFile']['tmp_name'], $uploadfile);
	
	echo "<form id='frmSQL' action='tchr_process_qstn.php?user=".$_GET['user']."&key=".$_GET['key']."' method='post'>";
	echo "<input type='text' name='frmFileSQL' id='frmFileSQL' style='display: none;' />";
	echo "</form>";
}

require 'tchr_footer.php';
?>
