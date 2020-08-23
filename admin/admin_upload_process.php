<?php
require 'admin_authenticate.php';
require 'admin_header.php';
?>


<script>
	$(document).ready(function() {
		var x = <?php echo json_encode($_GET['user']); ?>;
		var y = <?php echo json_encode($_GET['key']); ?>;
		var z = <?php echo json_encode($_FILES['frmDataFile']['name']); ?>;

		var dataArguments = { user: x, key: y, filename: z }; 
		$.ajax({
			type: 'GET',
			url: "admin_fetch_data.php",
			data: dataArguments,
			dataType: "text",
			success: function(resultData) {
				document.getElementById('frmFileUploadData').value = resultData;
				document.getElementById("frmJson").submit();
			}
		});
	});
</script>

<?php

if(isset($_FILES['frmDataFile'])) {
	$uploaddir = '../raw_uploaded_file/';
	$uploadfile = $uploaddir . $_FILES['frmDataFile']['name'];
	move_uploaded_file($_FILES['frmDataFile']['tmp_name'], $uploadfile);
	
	echo "<form id='frmJson' action='admin_upload_save.php?user=".$_GET['user']."&key=".$_GET['key']."&type=".$_GET['type']."' method='post'>";
	echo "<input type='text' name='frmFileUploadData' id='frmFileUploadData' style='display: none;' />";#style='display: none;'
	echo "</form>";
}


require 'admin_footer.php';
?>
