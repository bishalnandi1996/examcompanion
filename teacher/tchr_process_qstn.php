<?php
	require 'tchr_authenticate.php';

	$sql=$_POST['frmFileSQL'];
	mysqli_multi_query($link,$sql);

	header('Location: tchr_qstn_upload_form.php?user='.$_GET['user'].'&key='.$_GET['key'].'&status=1');
?>
